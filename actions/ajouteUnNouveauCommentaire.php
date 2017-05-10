<?php
session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');


$commentaire = new Commentaire($_POST['commentaire']);

$gestionCommentaire = new GestionCommentaires(bdd());

$gestionCommentaire->EnregistrerNouveauCommentaire($commentaire);

redirection("article.php?id=".$commentaire->idArticle());

