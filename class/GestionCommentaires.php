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


        $commentaires = [];
        while ($commentaire = $q->fetch(PDO::FETCH_ASSOC))
        {
            $commentaires[]= $commentaire;
        }
        $q->closeCursor();
        $tousLesCommentaires = [];
        foreach($commentaires as $value)
        {
            $tousLesCommentaires[] = new Commentaire($value);
        }
        return $tousLesCommentaires;
    }

    public function EnregistrerNouveauCommentaire($donnees)
    {
        $idArticle = (int) $donnees->idArticle();
        $idParent = $donnees->idParent();
        $commentaire = $donnees->commentaire();
        $idAuteur = $donnees->idAuteur();
        $date = date("d-m-y H:i:s");

        $q = $this->bdd->prepare('INSERT INTO commentaires (idArticle, commentaire, idAuteur, idParent, date) VALUE (?, ?, ?, ?, ?)');
        return $q->execute([$idArticle, $commentaire, $idAuteur, $idParent, $date]);

    }

    public function enfants(int $idArticle)
    {
        $q = $this->bdd->prepare('SELECT * FROM commentaires WHERE idArticle = ?');
        $q->execute([$idArticle]);
        $commentaires = [];
        while ($commentaire = $q->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($commentaire);
        }
        $parents = [];
        foreach ($commentaires as $commentaire)
        {
            if($commentaire->idParent() == 0 )
            {
                $parents[] = $commentaire;
            }

            $commentaire->setEnfants(array_filter($commentaires, function($commentaireEnCours) use($commentaire)
            {
                return ($commentaire->id() == $commentaireEnCours->idParent())? true : false ;
            }
            ));
        }


        return $parents;

    }
}
