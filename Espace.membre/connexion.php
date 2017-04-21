<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

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
    <?php
    require(RACINSRV.'/menu_header.php');
    ?>
</header>
<h1>Connexion</h1>
<?php

if(estConnecte())
{
    echo 'Vous êtes déjà connecté';
    die;
}
if (!empty($_SESSION['errors']['connexion'])){
    echo $_SESSION['errors']['connexion'];
    unset($_SESSION['errors']['connexion']);
}

?>
<form action="<?php echo FONCTION_URL.'lanceLaConnexion.php' ?>" method="post" >
    <label for="login" title="login">login:</label>
    <input type="text" name="login" id="login" required/>

    <label for="password" title="password">Mot de passe:</label>
    <input type="text" name="password" id="password" required/>

    <input type="submit" value="Connexion" />
</form>

</body>
</html>