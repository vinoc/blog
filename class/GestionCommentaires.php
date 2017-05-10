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
            $donnee= $q-> execute([$idArticle]);

//Placer les articles dans un tableau, puis les trier par idParent
            if ($donnee == false)
            {
                return null;
            }
            else
            {
                while ($commentaire = $q->fetch(PDO::FETCH_ASSOC))
                {
                    $tousLesCommentaires[] = new Commentaire($commentaire);
                }
                return $tousLesCommentaires;
            }
    }

    public function EnregistrerNouveauCommentaire($donnees): bool
    {
        $idArticle = (int) $donnees->idArticle();
        $idParent = $donnees->idParent();
        $commentaire = $donnees->commentaire();
        $idAuteur = $donnees->idAuteur();
        $date = date("d-m-y");

        $q = $this->bdd->prepare('INSERT INTO commentaires (idArticle, commentaire, idAuteur, idParent, date) VALUE (?, ?, ?, ?, ?)');
        return $q->execute([$idArticle, $commentaire, $idAuteur, $idParent, $date]);

    }

}