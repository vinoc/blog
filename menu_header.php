<?php
session_start();
require (FONCTION_PATH.'fonctions.php');

ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"  type="text/css" href="http://cheezpa.com/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href= "<?php echo FONCTION_URL ?>css.css" />
    <link rel="icon" href="http://cheezpa.com/cheezpafavico.jpg" />
</head>
<body>
<header>
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header"><a class="navbar-brand" href="<?php echo $host; ?>" >Bienvenue sur cheezpa.com</a></div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo $host; ?>/connexion.php">Connexion</a></li>
        <li><a href="<?php echo HOST; ?>/actions/lanceLaDeconnexion.php">Deconnexion</a></li>
        <li><a href ="<?php echo $host; ?>/inscription.php">Inscription</a></li>
        <li><a href="#">Articles</a></li>



    </ul>
</div>

</header>