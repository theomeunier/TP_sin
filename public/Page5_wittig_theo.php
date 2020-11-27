<?php

/**
 * on vérifie si y a bien des donner dans la db
 * on vérifie le username
 * on vérifie le mdp
 */
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    //si y a bien ces info alors on lui donner accée a la db
    require './db.php';

    /**
     * on crée notre requet
     * la requet est mal faite
     * envoyer de mail pour vérifier le compte
     * demande si le compte est bien verifier
     */
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    //on excute notre requet
    $req->execute(['username' => $_POST ['username']]);
    //on recupere l'utilisateur
    $user = $req->fetch();

    //on vérifie le mdp de l'utilisateur
    if (password_verify($_POST['password'], $user->password)){
        //on demarre la session
        session_start();

        //si le mdp est bon alors on connecte l'utilisateur
        $_SESSION['auth'] = $user;
        //on met un message
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté au site';
        //on redirige l'utlisateur vers l'index
        header('Location: index.php');
        //on arrete le script
        exit();
    }else{
        //on met un mesage comme quoi le mdp n'est pas correct
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Page WEB SIN 2020 2021</title>
</head>

<body>
<div class="page">
    <div class="zone1">
        <div class="photo"><img src="img/photo.jpeg" alt="ma photo" width="92" height="100" /></div>
        <div class="texte">
            Page WEB SIN<br/>
            WITTIG theo<br/>
        </div>
        <div class="div_sub_text">
            <p class="sub_text">email : theo.wittig@free.fr</p>
            <p class="sub_text">Tel : 01 02 03 04 05</p>
        </div>

        <hr>

        <div class="menu">
            <ul>
                <li><a href="index.php">Classeur <br> sin</a></li>
                <li><a href="Page1_wittig_theo.html">Classeur <br> 2I2D</a></li>
                <li><a href="Page2_wittig_theo.html">EDT <br> TSTI2D3</a></li>
                <li><a href="Page3_wittig_theo.html">Page <br> perso</a></li>
                <li><a href="Page4_wittig_theo.html">admin <br> site</a></li>
                <li><a href="Page5_wittig_theo.php">login</a></li>
            </ul>
        </div>
    </div>
    <div class="partie">
        <div class="parti_login">
            <form action="" method="post">
                <div class="form_content">
                    <label for="">Pseudo ou Mail</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form_content">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form_content">
                    <button type="submit" class="btn-primary">Me connecter</button>
                </div>
            </form>
        </div>

    <div class="zone4">
        <p>Date de cr&eacuteation : 18/11/2020</p>
        <p>Derni&egravere mise &agrave jour le : 18/11/2020</p>
    </div>
</div>
</body>
</html>

