<section id="afficheArticle" class="container">
    <h1 class="centre"><?php echo $article->titre(); ?></h1>

<article>
    <div id="article"><?php echo $article->contenu(); ?> </div>

    <div id="auteur" class="centre">L'auteur: <?php echo $auteur; ?> </div>
</article>

</section>




<section class="container" id="commentaire">
<table>
    <tr><th>commentaire</th></tr>

        <?php

        foreach ($commentaires as $contenu)
        {
            ?>
    <tr>

        <td>
            <?php echo $contenu->commentaire(); ?>
        </td>
    </tr>
<?php
        }
        ?>

</table>



</section>




<section id="formulaireCommentaire" class="container">
    <form action ="<?php echo ACTIONS_URL;?>ajouteUnNouveauCommentaire.php" method="post" >
        <input type="text" name="commentaire[commentaire]" id="commentaire[contenu]" />

        <input type="number" name="commentaire[idArticle]" id="commentaire[idArticle]" value="<?php echo $article->id(); ?>" hidden />
        <input type="number" name="commentaire[idAuteur]" id="commentaire[idAuteur]" value="<?php echo $membreConnecte->id() ; ?>" hidden  />

        <input type="submit" value="Envoyer votre commentaire" />
    </form>


</section>






