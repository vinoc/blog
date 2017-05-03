<section class="container">
    <form action="actions/enregistreArticle.php" method="post">
        <label for ="titre">Titre de l'article</label>
        <input type="text" name="nouveauArticle[titre]" id="titre" />

        <label for="contenu">Votre article:</label>
        <textarea name="nouveauArticle[contenu]" id="contenu"></textarea>

        <input type="number" value="<?php echo $auteurId ; ?>" name="nouveauArticle[auteurId]" id="auteurId" hidden />



        <input type="submit" value="Envoyer" />






    </form>



</section>