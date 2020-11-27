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
                <?php if (isset($_SESSION['auth'])): ?>
                    <li><a href="Page5_wittig_theo.php">Se <br>déconnecter</a></li>
                <?php else: ?>
                    <li><a href="Page5_wittig_theo.php">Me<br>connecter</a></li>
                <?php  endif ?>
            </ul>
        </div>
    </div>
    <div class="partie">
        <div class="zone2">
            <h1> S&eacutequence 1 : Arduino</h1>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_Arduino.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>

        <div class="zone3"><br><br>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_algo_devos_Ver25012019.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>
    </div>

    <div class="partie">
        <div class="zone2">
            <h1> S&eacutequence 2 : les algorithmes</h1>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_Arduino.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>

        <div class="zone3"><br><br>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_algo_devos_Ver25012019.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>
    </div>

    <div class="partie">
        <div class="zone2">
            <h1> S&eacutequence 3 : Page web, HTML</h1>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_Arduino.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>

        <div class="zone3"><br><br>
            <ul>
                <li><a href="../tp_1/pdf/01_Cours_algo_devos_Ver25012019.zip" target="">Exemple de fichier Algo </a></li>
            </ul>
        </div>
    </div>


    <div class="zone4">
        <p>Date de cr&eacuteation : 18/11/2020</p>
        <p>Derni&egravere mise &agrave jour le : 18/11/2020</p>
    </div>
</div>
</body>
</html>

