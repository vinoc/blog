<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
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

<section>
    <?php

    if(!estConnecte())
    {
    ?>
    <h2>Inscription</h2>


    <form action="<?php echo FONCTION_URL . 'enregistreInscription.php'; ?>" method="post">

        <label for="login">Login: <?php echo recupererErreur('login'); ?> </label>
        <input name="login" id="login" type="text" maxlength="15" required />
        <label for="mail">E-mail : <?php echo recupererErreur('mail'); ?></label>
        <input name="mail" id="mail" type="email" maxlength="255" required />
        <label for="password">Mot de passe: <?php echo recupererErreur('password'); ?> </label>
        <input name="password" id="password" type="password" required/>
        <label for="passwordVerification">Retaper votre mot de
            passe: <?php echo recupererErreur('passwordVerification'); ?></label>
        <input name="passwordVerification" id="passwordVerification" type="password" required />

        <input type="submit" value="s'enregistrer">

        <?php

        }
        Else{

            ?>

            <p> Vous êtes déjà connecté, vous ne pouvez pas créer plusieurs comptes</p>
            <?php
        }

?>



    </form>


</body>
</html>