<?php
//$_COOKIE['id'] -> contient un pass temporaire
//$_SESSION['estConnecte']
//$_SESSION['status']


class Membre extends Connexion
{
	private $_id;
	private $_nom;
	private $_status;

	   //session['status']=
    const ADMIN = 1;
    const AUTEUR = 2;
    const MEMBRE = 3;

    public function __construct($donnee)
    {
    	$this->setId($donnee);
    }


    public function setId($id)
    {
    	if(is_int($id))
    	{
    		
    	}
    }
}
?>