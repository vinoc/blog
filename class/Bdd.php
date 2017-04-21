<?php

class Bdd
{
    protected $_bdd;
    protected $_bddNom = 'test';
    protected $_bddLogin = 'root';
    protected $_bddPassword= '';
    protected $_bddDomaine = 'localhost' ;

    private $_id;
    private $_status;

 

    public function __construct()
    {
        $bddHost= "mysql:host=$this->_bddDomaine;dbname=$this->_bddNom;charset=utf8";

        
        $bdd = new PDO($bddHost, $this->_bddLogin, $this->_bddPassword);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->_bdd = $bdd;
    }
       
    public function bdd()
    {
        return $this->_bdd;
    }
    
    public function espaceMembre()
    {
        $bdd= $this->bdd();
       

        $req = $bdd->query('SELECT * FROM espacemembre');
        while ($donnee = $req->fetch()) {
            $espaceMembre[] = $donnee;
         } 
         return $espaceMembre;
    }

    public function article()
    {
        $bdd= $this->bdd();
       

        $req = $bdd->query('SELECT * FROM article');
        while ($donnee = $req->fetch()) {
            $article[] = $donnee;
         } 
         return $article;
    }

    public function commentaires()
    {
        $bdd= $this->bdd();
       

        $req = $bdd->query('SELECT * FROM commentaires');
        while ($donnee = $req->fetch()) {
            $commentaires[] = $donnee;
         } 
         return $commentaires;
    }

}


?>