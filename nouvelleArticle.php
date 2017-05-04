
<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');

if ($membreConnecte->estmembre())
{
    $_SESSION['errors']['droit'] = "Vous n'avez pas les droits suffisant pour effectuer cette action";
    redirection('index.php');
}

$titrePage = 'Ajout d\'un nouvelle Article';

require (PARTIAL_PATH.'header_menu.php');



$auteurId = $membreConnecte->id();

require (PARTIAL_PATH.'_nouvelleArticle.php')

?>