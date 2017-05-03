<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');

if ($membreConnecte->estAdmin() !== true)
{
    redirection('index.php');
}

$erreur= recupererErreur('administration');

$ListeArticles = new GestionArticles(bdd());

$listes = $ListeArticles->listerArticles();


require (PARTIAL_PATH.'header_menu.php');
require (PARTIAL_PATH.'_administrerArticles.php');
require (PARTIAL_PATH.'_footer.php');