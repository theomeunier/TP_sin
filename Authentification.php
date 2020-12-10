<?php
session_start();

// accès à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=classeur_web', 'root', 'root');


if (isset($_POST['valider'])) {  //ATTENTION le "$_POST['valider']" ici fait le lien avec le //formulaire au bas de ce fichier
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);
    if (!empty($login) and !empty($mdp)) {   // vérification si le login et le mdp sont renseignés
        $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND mdp = ?");
        $requser->execute(array($login, $mdp));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {   // s'il existe un enregistrement dans la base qui correspond au login //et mdp du formulaire
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['login'] = $userinfo['login'];
            $_SESSION['mdp'] = $userinfo['mdp'];
            $_SESSION['acces'] = $userinfo['acces']; // on récupère le type d'accès de l'utilisateur
            echo "acces" . $_SESSION['acces'];
            if ($_SESSION['acces'] == 2) {
                //si accès type 2 on affiche la page 1 admin
                header("Location: page_Admin/page0_Admin_wittig_theo.php?id=" . $_SESSION['id']);
            } else {
                if ($_SESSION['acces'] == 1) {
                    //si accès type 1 on affiche la page 1 priv
                    header("Location: page_Priv/page0_Priv_wittig_theo.php?id=" . $_SESSION['id']);
                } else {
                    //si accès type 0 on affiche la page 1 autre
                    header("Location: page_Autre/page0_Autre_wittig_theo.php?id=" . $_SESSION['id']);
                }
            }
        } else {
            $erreur = "Mauvais login ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Page WEB SIN 2020 2021</title>
</head>

<body>
<div class="page">
    <div class="zone1">
        <div class="photo">
            <img src="img/photo.jpeg" alt="ma photo" width="80" height="100" />
        </div>
        <div class="texte">
            Page WEB SIN<br/>
            WITTIG theo<br/>
        </div>
        <div class="div_sub_text">
            <p class="sub_text">email : theo.wittig@free.fr</p>
            <p class="sub_text">Tel : 01 02 03 04 05</p>
        </div>
    </div>

    <div class="zone5">
        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
        ?>
        <form method="post" action="" style="margin-top: 5em">
            <input type="text" name="login" placeholder="login" />
            <input type="text" name="mdp" placeholder="Mot de passe" />
            <br />
            <br />
            <button type="submit" name="valider">Se connecter</button>
        </form>
    </div>
    <div class="zone4">
        <p>Date de cr&eacuteation : 12/11/2020</p>
        <p>Derni&egravere mise &agrave jour le : 13/11/2020</p>
    </div>
</div>
</body>

</html>