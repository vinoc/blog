<?php


class GestionnaireMail
{
    private $adresseMail;
    private $objet;
    private $message;


    public function __construct($donnees)
    {
        $this->setAdressemail($donnees['adresseMail']);
        $this->setMessage($donnees['message']);
        $this->setObjet($donnees['objet']);

    }

    public function setAdressemail($adresseMail)
    {
        if(filter_var($adresseMail, FILTER_VALIDATE_EMAIL))
        $this->adresseMail = $adresseMail;
    }

    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function envoyerMail()
    {
            if($this->adresseMail == null)
            {
                return false;
            }


            if($this->message == null OR $this->objet == null)
            {

                return false;
            }


        //return mail($this->adresseMail, $this->objet, $this->message);
        return true;


    }





}