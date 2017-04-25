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



        public function updateMembre_PassTemp($id, $pass_temp):bool
        {
            $req = $this->bdd->prepare('UPDATE espacemembres SET pass_temp = :pass_temp WHERE id = :id ');
           $reussi= ($req->execute(compact('pass_temp','id'))) ? true : false ;
           return $reussi;
        }









}