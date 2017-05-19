<?php

class GestionCommentaires
{
    protected $bdd;


    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function listerCommentairesParArticle(int $idArticle)
    {
        $q = $this->bdd->prepare('SELECT * FROM commentaires WHERE idArticle = ?');
        $q-> execute([$idArticle]);


        //Placer les articles dans un tableau, puis les trier par date et idParent

        $tousLesCommentaires=[];
        while ($commentaire = $q->fetch(PDO::FETCH_ASSOC))
        {
            $tousLesCommentaires[] = new Commentaire($commentaire);
            //$tousLesCommentaires[]=$commentaire;
        }
        return $tousLesCommentaires;
    }

    public function EnregistrerNouveauCommentaire($donnees): bool
    {
        $idArticle = (int) $donnees->idArticle();
        $idParent = $donnees->idParent();
        $commentaire = $donnees->commentaire();
        $idAuteur = $donnees->idAuteur();
        $date = date("d-m-y H:i:s");

        $q = $this->bdd->prepare('INSERT INTO commentaires (idArticle, commentaire, idAuteur, idParent, date) VALUE (?, ?, ?, ?, ?)');
        return $q->execute([$idArticle, $commentaire, $idAuteur, $idParent, $date]);

    }

    public function enfants($id)
    {
        $q = $this->bdd->query('SELECT * FROM commentaires ');
    }
}
query selector
