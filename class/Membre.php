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
    const ADMIN = 'admin';
    const AUTEUR = 'auteur';
    const MEMBRE = 'membre';



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
        $status = is_string($status);

           switch ($status) {
               case 'admin':
                    $this->_status = self::ADMIN;
                    break;

                case 'auteur':
                    $this->_status = self::AUTEUR;
                    break;
                case 'membre':
                    $this->_status = self::MEMBRE;
                    break;
                default:
                    $this->_status = self::MEMBRE;


            }

    }


//Status du membre
    public function estAdmin()
    {
        return $this->status() == self::ADMIN ;

    }

    public function estAuteur()
    {
        return $this->status() == self::AUTEUR ;
    }

    public function estMembre()
    {
        return $this->status() == self::MEMBRE;
    }

}
?>