<?php
session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');


$commentaire = new Commentaire($_POST['commentaire']);

$gestionCommentaire = new GestionCommentaires(bdd());

var_dump($gestionCommentaire->EnregistrerNouveauCommentaire($commentaire));

