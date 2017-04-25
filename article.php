<?php
require ('localisationfonction.php');
require (RACINE_SRV.'/menu_header.php');

if (estConnecte()== false)
{redirection('connexion.php');}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}
?>

<section id="afficheArticle">
    <?php
    // Afficher l'article avec "ArticleManager"
?>




</section>
