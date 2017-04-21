<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

if (estConnecte()== false)
{redirection('connexion.php');}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}



?>



<!DOCTYPE html>
<html>
<head>
    <title>accueil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"  type="text/css" href="http://cheezpa.com/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href= "<?php echo FONCTION_URL ?>css.css" />
    <link rel="icon" href="http://cheezpa.com/cheezpafavico.jpg" />
</head>
<body>
<header>

<?php
//require(RACINE_SRV.'/menu_header.php');

?>
</header>
<section class="container">
<?php
$bdd= bdd();
$articles = new GestionArticles($bdd);

$listes = $articles->listeArticles();
var_dump($listes);

$article = $articles->articleEnCours(1);
var_dump($article);

$membre = new MembreManager($bdd);
$Membre= $membre->getMembre('1');

var_dump($Membre->estAdmin());

    ?>
</section>
</body>
</html>