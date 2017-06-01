<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');

$ListeArticles = new GestionArticles(bdd());

$listes = $ListeArticles->listerArticles();

$titrePage= (isset($titrePage)) ? $titrePage : 'Blog de l\'ecrivain ' ;

$erreur=  recupererErreur('droit');

require (PARTIAL_PATH.'header_menu.php');
require (PARTIAL_PATH.'_accueil.php');
require (PARTIAL_PATH.'_footer.php');
?>

