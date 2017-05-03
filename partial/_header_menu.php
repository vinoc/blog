<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titrePage; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"  type="text/css" href="http://cheezpa.com/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href= "<?php echo FONCTION_URL ?>css.css" />
    <link rel="icon" href="http://cheezpa.com/cheezpafavico.jpg" />
</head>
<body>
<header>
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header"><a class="navbar-brand" href="<?php echo $host; ?>" >Blog de l'écrivain</a></div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo $host; ?>/connexion.php">Connexion</a></li>
        <li><a href="<?php echo HOST; ?>/actions/lanceLaDeconnexion.php">Deconnexion</a></li>
        <li><a href ="<?php echo $host; ?>/inscription.php">Inscription</a></li>
        <li><a href="#">Articles</a></li>
        <li class="<?php echo $visibiliteNouveauArticle; ?>"><a href="NouvelleArticle.php">Nouvelle article</a></li>
        <li class="<?php echo $visibiliteAdmin ; ?>"><a href="administrerArticles.php">Administrer articles</a> </li>



    </ul>
</div>

</header>
