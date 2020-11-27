<?php

/**
 * on ne detruit pas la session completement ça pourrais endomager les donner dans le cache
 * ou les donner de l'utilisateur
 *
 * donc on ouvre la session
 * puis on supprime la partie authentification
 */
session_start();
unset($_SESSION['auth']);

//on dit a l'utilisateur qu'il a bien été deconnecter
$_SESSION['flash']['success'] = 'Vous êtes bien maintenant déconnecter';

//on redirige l'utilisateur
header('Location: index.php');