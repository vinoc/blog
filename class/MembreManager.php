<?php

class MembreManager
{
    protected $bdd;


    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getMembre(int $id):Membre
    {
       // $id = (int) $id;
        $q= $this->bdd->prepare('SELECT * FROM espacemembres WHERE id = ?');
        $q->execute([$id]);
        $q->CloseCursor();
        return new Membre($q->fetch());
    }

    public function connectionMembre($login, $motDePasse): bool
    {
        $q = $this->bdd->prepare('SELECT * FROM espacemembres WHERE id= ?');
        $q->execute([$login]);
        $q->closeCursor();
        $donnees = $q->fetch();

        if ($donnees == false)
        {
            $_SESSION['erreurs']['login'] = 'Login incorrect';
            return false;
        }

        if (password_verify($motDePasse,$donnees['pass'])== false)
        {
            $_SESSION['erreurs']['motdepasse'] = 'Mot de passe incorrect';
            return false;
        }

        $_SESSION['membreId'] = $donnees['id'];
        $pass_temp = uniqid('', true);
        setcookie('id', $pass_temp ,time()+30+24+3600, '/', $_SERVER['HTTP_HOST'], false, true);
        $changementPassetemp= $this->updateMembre($donnees['id'], $pass_temp);
        if($changementPassetemp == false)
        {
            $_SESSION['erreurs']['erreur']= 'Une erreur est survenu, veuillez recommencer';
        }
        return true;

    }

        public function updateMembre($id, $pass_temp):bool
        {
            $req = $bdd->prepare('UPDATE espacemembres SET pass_temp = :pass_temp WHERE id = :id ');
            $req->execute(compact('pass_temp','id'));

            return $req;
        }









}