<?php

class Commentaire
{
    private $idArticle;
    private $id;
    private $commentaire;
    private $idAuteur;
    private $date;
    private $idParent;
    private $status;
    private $enfants;

    public function __construct($donnees)
    {
        if($donnees !== null)
        {
            $this->setIdArticle($donnees['idArticle']);
            $this->setId($donnees['id']);
            $this->setCommentaire($donnees['commentaire']);
            $this->setIdAuteur($donnees['idAuteur']);
            if (isset($donnees['date'])) {
                $this->setDate($donnees['date']);
            }
            if (isset($donnees['idParent'])) {
                $this->setIdParent($donnees['idParent']);
            }
            else{
                $this->setIdParent('0');
            }
            $this->setEnfants([]);

        }

    }



//--------------- getteurs---------------------



    public function idArticle()
    {
        return $this->idArticle;
    }
    public function id()
    {
        return $this->id;
    }
    public function commentaire()
    {
        return htmlspecialchars($this->commentaire);
    }
    public function idAuteur()
    {
        return $this->idAuteur;
    }
    public function date()
    {
        return $this->date;
    }
    public function idParent()
    {
        return $this->idParent;
    }
    public function status()
    {
        return $this->status;
    }
    public function enfants()
    {
        return $this->enfants;
    }



//-------------------SETTEUR------------------





    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function setIdParent( $idParent)
    {

        if($idParent == 0)
        {
            $this->idParent = $idParent;
            $this->setStatus('parent');
        }
        else {
            $this->idParent = $idParent;
            $this->setStatus('enfant');
        }
    }

    public function setStatus($status)
    {
        $status = trim($status);
        $this->status = $status;
    }

    public function setEnfants($enfants)
    {

        $this->enfants = $enfants;
    }

}