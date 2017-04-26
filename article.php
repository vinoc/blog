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

$article = $gestionArticles->articleEnCours($idArticle);

$auteur = nomAuteur($article['idAuteur']);

$titrePage= $article['titre'];

require (RACINE_SRV.'/menu_header.php');
?>

<section id="afficheArticle" class="container">
    <h1 class="centre"><?php echo $article['titre']; ?></h1>

    <article>
    <div id="article"><?php echo $article['article']; ?> </div>

    <div id="auteur" class="centre">L'auteur: <?php echo $auteur; ?> </div>
    </article>

</section>
<section id="comentaire" class="container">
    Commentaires


</section>

<footer></footer>
</body>
</html>