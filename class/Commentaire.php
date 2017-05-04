<?php

class Commentaire
{
    private $idArticle;
    private $commentaire;
    private $idAuteur;
    private $date;

    public function __construct(array $donnees)
    {
        $this->setIdArticle($donnees['idArticle']);
        $this->setCommentaire($donnees['commentaire']);
        $this->setIdAuteur($donnees['idAuteur']);
        if(isset($donnees['date'])) {
            $this->setDate($donnees['date']);
        }

    }

    public function idArticle(){return     $this->idArticle;}
    public function commentaire(){return    $this->commentaire;}
    public function idAuteur(){ return      $this->idAuteur; }
    public function date(){     return      $this->date;}

    public function setIdArticle(int $idArticle)
    {
        $this->idArticle = $idArticle;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setIdAuteur(int $idAuteur)
    {
        $this->idAuteur = $idAuteur;
    }

    public function setDate($date)
    {

        $this->date = (empty($date))? null : $date ;
    }




}