
<section class="container">

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
            </tr>
            <?php
        }
        ?>
    </table>

</section>