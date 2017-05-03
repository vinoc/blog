
<section class="container">
    <div class="centre"><?php echo $erreur ; ?></div>
    <table id="liste-articles">
        <tr>
            <th>Titre</th>
        </tr>
        <?php
        foreach ($listes as $contenu)
        {
            ?>
            <tr>
                <td><a href="<?php echo $host; ?>/article.php?id=<?php echo $contenu['id']; ?>"> <?php echo $contenu['titre']; ?> </a></td>

                <td><a href="<?php echo ACTIONS_URL ;?>supprimerArticle.php?idArticle=<?php echo $contenu['id']; ?>" ">Supprimer</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

</section>


