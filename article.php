<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

if (estConnecte()== false)
{redirection('connexion.php');}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}

//Si il n'y a pas de numéro d'article, alors l'article 1 sera affiché.
$idArticle=((int) $_GET['id'] == 0 ) ? '1' : $_GET['id'];

$gestionArticles = new GestionArticles(bdd());

$article = $gestionArticles->recupererArticleParId($idArticle);

$auteur = nomAuteur($article->idAuteur());

$titrePage= $article->titre();

require (PARTIAL_PATH.'header_menu.php');

require (PARTIAL_PATH.'_article.php');
?>


<footer></footer>
</body>
</html>