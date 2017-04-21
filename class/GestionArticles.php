<?php

class GestionArticles
{
    protected $bdd;


    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function listeArticles()
    {
        $donnees = [];
        $q = $this->bdd->query('SELECT id, titre FROM articles');
        while ($q->fetch()) {
            $donnees[] = $q;

        }
        return $donnees;
    }

    public function articleEnCours($idArticle)
    {
        $idArticle = (int)$idArticle;
        $q = $this->bdd->prepare('SELECT * FROM articles WHERE id= ?');
        $q->execute([$idArticle]);
        $q->closeCursor();
        return $q->fetch();
    }

    public function NouveauArticle($titre, $contenu, $membre): bool
    {
        $membre = new Membre($membre);
        if ($membre->estAdmin() OR $membre->estAuteur())
        {
            $q = $this->bdd->prepare('INSERT INTO articles (titre, article, idAuteur) VALUE (:titre, :article, :idAuteur)');

            $q->bindValue(':titre', $titre, PDO::PARAM_STR);
            $q->bindValue(':article', $contenu, PDO::PARAM_STR);
            $q->bindValue(':idAuteur', $membre->id(), PDO::PARAM_INT);

            return $q->execute();
        }
        else{
            return false;
        }
    }






}