<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titrePage; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"  type="text/css" href="http://cheezpa.com/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href= "<?php echo FONCTION_URL ?>css.css" />
    <link rel="icon" href="http://cheezpa.com/cheezpafavico.jpg" />
<!--Pour permetre de changer le contenu d'un input dans la page commentaire-->
    <link rel="stylesheet" href="https://get.mavo.io/mavo.css"/>
    <script src="https://get.mavo.io/mavo.js"></script>
</head>
<body>
<header>
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header"><a class="navbar-brand" href="<?php echo $host; ?>" >Blog de l'écrivain</a></div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo HOST; ?>connexion.php">Connexion</a></li>
        <li><a href="<?php echo HOST; ?>actions/lanceLaDeconnexion.php">Deconnexion</a></li>
        <li><a href ="<?php echo HOST; ?>inscription.php">Inscription</a></li>
        <li><a href="<?php echo HOST; ?>index.php">Articles</a></li>
        <li class="<?php echo $visibiliteNouveauArticle; ?>"><a href="<?php echo HOST; ?>NouvelleArticle.php">Nouvelle article</a></li>
        <li class="<?php echo $visibiliteAdmin ; ?>"><a href="<?php echo HOST; ?>administrerArticles.php">Administrer articles</a> </li>
        <li><a href="<?php echo HOST ; ?>envoiMail.php">Envoi mails</a> </li>



    </ul>
</div>

</header>
