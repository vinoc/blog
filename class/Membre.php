<?php
//$_COOKIE['id'] -> contient un pass temporaire
//$_SESSION['estConnecte']
//$_SESSION['status']


class Membre
{
	private $_id;
	private $_nom;
	private $_status;

	   //session['status']=
    const ADMIN = 1;
    const AUTEUR = 2;
    const MEMBRE = 3;



    public function __construct($donnees)
    {
    	$this->setId($donnees['id']);
    	$this->setNom($donnees['login']);
    	$this->setStatus($donnees['status']);
    }

    //Les getteurs
    public function id(){       return $this->_id ; }
    public function nom(){      return $this->_nom;}
    public function status(){   return $this->_status;}


    //Les setteurs
    public function setId($id)
    {
        $this->_id = ((int)$id >=1) ? (int)$id : null ;
    }

    public function setNom($login)
    {
        $this->_nom = (is_string($login)) ? htmlspecialchars($login) : null ;
    }

    public function setStatus($status)
    {
        $status = (int)$status;
        if ($status <= 3 AND $status >= 1) {
            $this->_status = $status;
        }
    }


//Status du membre
    public function estAdmin(): bool
    {
        return $this->status() == self::ADMIN ;
    }

    public function estAuteur(): bool
    {
        return $this->status() == self::AUTEUR ;
    }

    public function estMembre(): bool
    {
        return $this->status() == self::MEMBRE;
    }

}
?>