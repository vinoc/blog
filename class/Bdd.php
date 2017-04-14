<?php

class Bdd
{
    protected $_bdd;
    protected $_bddNom;
    protected $_bddLogin = 'root';
    protected $_bddPassword= '';
    protected $_bddDomaine = 'localhost' ;

    private $_id;
    private $_status;

 

    public function __construct($bddNom)
    {
        $bddHost= "mysql:host=$this->_bddDomaine;dbname=$bddNom;charset=utf8";

        
        $_bdd = new PDO($bddHost, $bddLogin, $bddMDP);
        $_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->_bdd = $bdd;
    }
       
    
    

}


?>