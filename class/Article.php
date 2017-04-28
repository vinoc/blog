<?php

class Article{

    private $titre;
    private $contenu;
    private $idAuteur;

    public function titre() {   return htmlspecialchars($this->titre);  }
    public function contenu(){  return htmlspecialchars($this->contenu); }
    public function idAuteur(){ return htmlspecialchars($this->idAuteur); }




    public function __construct(array $donnees)
    {

        $this->setTitre($donnees['titre']);
        $this->setContenu($donnees['article']);
        $this->setIdAuteur($donnees['idAuteur']);

    }


    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setContenu($contenu)
    {
        $this->contenu= $contenu;
    }

    public function setIdAuteur($idAuteur)
    {
        $this->idAuteur=$idAuteur;
    }





}

