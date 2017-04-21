<?php session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');



if(!estConnecte())
{
    redirection('connexion.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>page privé</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"  type="text/css" href="http://cheezpa.com/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href= "<?php echo FONCTION_URL ?>css.css" />
    <link rel="icon" href="http://cheezpa.com/cheezpafavico.jpg" />
</head>
<body>
<header>
    <?php
    require(RACINSRV.'/menu_header.php');
    ?>
</header>
page privé
</body>
</html>