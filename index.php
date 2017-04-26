<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');
require (PARTIAL_PATH.'estConnecte.php');



require (RACINE_SRV.'/menu_header.php');

?>

<section class="container">
<?php
$bdd= bdd();
$ListeArticles = new GestionArticles($bdd);

$listes = $ListeArticles->listeArticles();
?>
    <table id="liste-articles">
        <tr>
            <th>Titre</th>
        </tr>
        <?php
        foreach ($listes as $contenu)
        {
            ?>
        <tr>
            <td><a href="article.php?id=<?php echo $contenu['id']; ?>"> <?php echo $contenu['titre']; ?> </a></td>
        </tr>
        <?php
        }
        ?>
    </table>

</section>
</body>
</html>