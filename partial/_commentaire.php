<li>
    <?php echo $commentaire->commentaire(); ?>
    <ul>
        <?php foreach ($commentaire->enfants() as $enfant) : ?>
            <?php  afficher_commentaire($enfant)?>
        <?php endforeach; ?>
    </ul>
</li>