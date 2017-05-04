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

//Placer les articles dans un tableau, puis les trier par idParent

            return new Article($q->fetch(PDO::FETCH_ASSOC));
    }

    public function EnregistrerNouveauCommentaire($donnees): bool
    {
        $idArticle = (int) $donnees->idArticle;
        $idParent = (isset($donnees->idParent)) ?(int) $donnees->idParent : null ;
        $commentaire = $donnees->commentaire;
        $idAuteur = (isset($donnees->idAuteur)) ?(int) $donnees->idAuteur : 0 ;

        $q = $this->bdd->prepare('INSERT INTO commentaires (idArticle, commentaire, idAuteur, idParent, date) VALUE (:idArticle, :commentaire, :idAuteur, :idParent, now())');
        return $q->execute(compact('idArticle', 'commentaire', 'idAuteur', 'idParent'));

    }

}