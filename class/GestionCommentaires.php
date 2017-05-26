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

            $commentaire->setEnfants(array_filter($commentaires, function($commentaireEnCours) use($commentaire){
                return ($commentaire->id() == $commentaireEnCours->idParent())? true : false ;
            }));
        }


        return $parents;




        //Pour chaque commentaire, on recherche les commentaires enfants.
        foreach ($commentaires as $commentaire) {
            $idCommentaire = $commentaire->id();

            foreach ($commentaires as $value => $key) {
                if (array_search($idCommentaire, $value['idParent'], true)) {
                    $commentaire['enfant'] = $value['id'];
                }
            }
        }
        var_dump($commentaires);
        die();


    }
}
