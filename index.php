<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');





$bdd= bdd();
$ListeArticles = new GestionArticles($bdd);

$listes = $ListeArticles->listerArticles();

$titrePage= (isset($titrePage)) ? $titrePage : 'Blog de l\'ecrivain ' ;

if (isset($membreConnecte)) {
    $visibilite = ($membreConnecte->estAdmin() OR $membreConnecte->estAuteur()) ? 'visible' : 'cache';
}
else {
    $visibilite = 'cache';
}



require (PARTIAL_PATH.'header_menu.php');
require (PARTIAL_PATH.'_accueil.php')

?>

