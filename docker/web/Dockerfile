# the different stages of this Dockerfile are meant to be built into separate images
# https://docs.docker.com/compose/compose-file/#target

ARG PHP_VERSION=7.4
ARG NGINX_VERSION=1.15

### NGINX
FROM nginx:${NGINX_VERSION}-alpine AS symfony_docker_nginx

COPY docker/nginx/conf.d /etc/nginx/conf.d/

# Set timezone
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

RUN apk add --no-cache --virtual .persistent-deps \
    curl \
	git \
	icu-libs \
	zlib

### PHP
FROM php:${PHP_VERSION}-fpm-alpine AS symfony_docker_php

ENV APCU_VERSION 5.1.11
RUN set -eux \
	&& apk add --no-cache --virtual .build-deps \
		$PHPIZE_DEPS \
		icu-dev \
		zlib-dev \
		postgresql-dev \
		libwebp-dev \
		libpng-dev \
		freetype-dev \
		imagemagick-dev \
		libjpeg-turbo-dev \
		libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install -j"$(getconf _NPROCESSORS_ONLN)" \
		intl \
		zip \
		pdo \
		mysqli \
		pdo_mysql \
		pdo_pgsql \
		gd \
	&& pecl install \
		apcu \
		imagick \
	&& docker-php-ext-enable --ini-name 20-apcu.ini apcu \
	&& docker-php-ext-enable --ini-name 05-opcache.ini opcache \
    	&& runDeps="$( \
    		scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
    			| tr ',' '\n' \
    			| sort -u \
    			| awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    	)" \
    	&& apk add --no-cache --virtual .php-phpexts-rundeps $runDeps \
    	&& apk del .build-deps

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /srv/app
CMD ["php-fpm"]

COPY . /srv/app
COPY .env /srv/app/.env
