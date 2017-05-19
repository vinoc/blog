<?php
session_start();
require ('localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

$donnees= $_REQUEST;

$mail = new Mail($donnees['adresseMail'], $donnees['objet'], $donnees['message'] );

$envoi= ($mail->sendMail('1'))? 'true' : 'false';

echo $envoi;




