<?php
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');

if ($membreConnecte->estAdmin() !== true)
{
    redirection('index.php');
}

$gestionArticle= new GestionArticles(bdd());

$idArticle = (int) $_GET['idArticle'];

if ($gestionArticle->supprimerArticle($idArticle) == true)
{
    $_SESSION['errors']['admin'] = 'Article supprimé';
    redirection('administrerArticles.php');
}
else
{
    $_SESSION['errors']['admin'] = 'Suppression impossible';
    redirection('administrerArticles.php');
}