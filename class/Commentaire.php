<?php

class Commentaire
{
    private $idArticle;
    private $commentaire;
    private $idAuteur;
    private $date;
    private $idParent;

    public function __construct($donnees)
    {
        if($donnees !== null)
        {
            $this->setIdArticle($donnees['idArticle']);
            $this->setCommentaire($donnees['commentaire']);
            $this->setIdAuteur($donnees['idAuteur']);
            if (isset($donnees['date'])) {
                $this->setDate($donnees['date']);
            }
            if (isset($donnees['idParent'])) {
                $this->setIdParent($donnees['idParent']);
            }
        }

    }

    public function idArticle(){    return $this->idArticle;}
    public function commentaire(){  return htmlspecialchars($this->commentaire);}
    public function idAuteur(){     return $this->idAuteur; }
    public function date(){         return $this->date;}
    public function idParent(){     return $this->idParent;}

    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setIdAuteur($idAuteur)
    {
        $this->idAuteur = $idAuteur;
    }

    public function setDate($date)
    {

        $this->date = (empty($date))? null : $date ;
    }

    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;
    }


}