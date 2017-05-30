<?php

class GestionArticles
{
    protected $bdd;


    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function listerArticles()
    {
        $toutLesArticles = [];
        $q = $this->bdd->query('SELECT id, titre FROM articles');
        while ($ligneParLigne = $q->fetch(PDO::FETCH_ASSOC)) {
        $toutLesArticles[] = $ligneParLigne;
        }
        return $toutLesArticles;
    }

    public function recupererArticleParId(int $idArticle)
    {
        $q = $this->bdd->prepare('SELECT * FROM articles WHERE id= ?');
        $q->execute([$idArticle]);

        return new Article($q->fetch(PDO::FETCH_ASSOC));

    }

    public function NouveauArticle($nouveauArticle, $membre)
    {

        if ($membre->estAdmin() OR $membre->estAuteur())
        {
            $q = $this->bdd->prepare('INSERT INTO articles (titre, article, idAuteur) VALUE (:titre, :article, :idAuteur)');

            $q->bindValue(':titre', $nouveauArticle['titre'], PDO::PARAM_STR);
            $q->bindValue(':article', $nouveauArticle['contenu'], PDO::PARAM_STR);
            $q->bindValue(':idAuteur', $membre->id(), PDO::PARAM_INT);

            return $q->execute();
        }
        else{
            return false;
        }
    }


    public function supprimerArticle($idArticle)
    {
        $q = $this->bdd->prepare('DELETE FROM articles WHERE id = ?');
        return $q->execute([$idArticle]);
    }



}