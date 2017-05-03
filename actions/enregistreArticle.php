<?php
session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');

if ($membreConnecte->estmembre())
{
    $_SESSION['errors']['droit'] = "Vous n'avez pas les droits suffisant pour effectuer cette action";
    redirection('index.php');
}

$nouveauArticle = $_POST['nouveauArticle'];

$gestionArticle = new GestionArticles(bdd());

$estEnregistre= $gestionArticle->NouveauArticle($nouveauArticle, $membreConnecte);

if ($estEnregistre== true)
{
    $_SESSION['errors']['droit'] = 'Nouvelle article enregistré avec succes';
    redirection('index.php');
}
else
{
    $_SESSION['NouvelleArticle']= $nouveauArticle;
    $_SESSION['errors']['echeque'] = 'Echeque de l\'enregistrement, veuillez recommencer';
    redirection('nouvelleArticle.php');
}

