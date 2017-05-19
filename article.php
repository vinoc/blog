<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');


//Si il n'y a pas de numéro d'article, alors l'article 1 sera affiché.
$idArticle=((int) $_GET['id'] == 0 ) ? '1' : $_GET['id'];

$gestionArticles = new GestionArticles(bdd());

$article = $gestionArticles->recupererArticleParId($idArticle);

$auteur = nomAuteur($article->idAuteur());

$titrePage= $article->titre();


$listeCommentaires = new GestionCommentaires(bdd());

$commentaires = $listeCommentaires->listerCommentairesParArticle($idArticle);

//$commentaires a trier dans l'ordre avec les sous commentaire juste après leurs parents !

//fonction recursive:

function afficher_commentaires($parent, $niveau, $commentaires) {

    $html = "";
    $niveau_precedent = 0;

    if (!$niveau && !$niveau_precedent) $html .= "\n<ul>\n";

    foreach ($commentaires AS $commentaire) {

        if ($parent == $commentaire->idParent()) {

            if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";

            $html .= "<li>" . $commentaire->commentaire();

            $niveau_precedent = $niveau;

            $html .= afficher_commentaires($commentaire->id(), ($niveau + 1), $commentaires);

        }
    }

    if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
    else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
    else $html .= "</li>\n";

    return $html;

}

function afficher_commentaire($commentaire)
{
    include (PARTIAL_PATH.'_commentaire.php');

}






require PARTIAL_PATH.'header_menu.php';

require PARTIAL_PATH.'_article.php';

require PARTIAL_PATH.'_footer.php';
?>
