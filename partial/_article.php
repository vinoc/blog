<section id="afficheArticle" class="container">
    <h1 class="centre"><?php echo $article->titre(); ?></h1>

<article>
    <div id="article"><?php echo $article->contenu(); ?> </div>

    <div id="auteur" class="centre">L'auteur: <?php echo $auteur; ?> </div>
</article>

</section>


<section class="container" id="commentaire">

    <ul>
        <?php foreach ($commentaires as $commentaire) : ?>
            <?php  afficher_commentaire($commentaire)?>
        <?php endforeach; ?>

<!--      modifier un input en js:   query selector-->
    </ul>
</section>


<section id="formulaireCommentaire" class="container">
    <form action ="<?php echo ACTIONS_URL;?>ajouteUnNouveauCommentaire.php" method="post" >
        <label for=""
        <input type="text" name="commentaire[commentaire]" id="commentaire[contenu]" />
        <input type="number" name="commentaire[idArticle]" id="commentaire[idArticle]" value="<?php echo $article->id(); ?>" hidden />
        <input type="number" name="commentaire[idAuteur]" id="commentaire[idAuteur]" value="<?php echo $membreConnecte->id() ; ?>" hidden  />
        <input type="number" name="idParent" id="idParent" value="" />
        <input type="submit" value="Envoyer votre commentaire" />
    </form>


</section>






