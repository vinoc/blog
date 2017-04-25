<?php
require ('localisationfonction.php');
require (RACINE_SRV.'/menu_header.php');

if (estConnecte()== false)
{redirection('connexion.php');}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}
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