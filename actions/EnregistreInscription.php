<?php
session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');


$login = trim($_POST['login']);
$mail=trim($_POST['mail']);
$password=$_POST['password'];
$passwordHash= password_hash($password,PASSWORD_DEFAULT);
$passwordVerification=$_POST['passwordVerification'];
$date =date("Y-m-d");
$pass_temp= uniqid('', true);
$bdd = bdd();

$_SESSION['errors']= [];

if (empty($login)){
    $_SESSION['errors']['login'] = 'Merci de renseigner votre login';
}
if (empty($mail)){
    $_SESSION['errors']['mail'] = 'Merci de renseigner votre E-Mail';
}
if (empty($password)){
    $_SESSION['errors']['password'] = 'Merci de renseigner votre mot de passe';
}
if( $password !== $passwordVerification){
    $_SESSION['errors']['passwordVerification'] = 'Vos mots de passe ne correspondent pas.';
}

if( !empty($_SESSION['errors']))
{
    redirection('inscription.php');
}


$req_antiDoublon = $bdd ->prepare('Select * FROM espacemembre WHERE login= ? OR mail = ? ');
$req_antiDoublon -> execute([$login,$mail]);
$antiDoublon= $req_antiDoublon->fetch();

if(!empty($antiDoublon)){
    if ($antiDoublon['login'] == $login)
    {
        $_SESSION['errors']['login'] = "Ce login est déjà pris ";
    }
    if ($antiDoublon['mail'] == $mail )
    {
        $_SESSION['errors']['mail'] =" Un compte existe déjà avec cette adresse mail.";
    }
   redirection('inscription.php');
}

$req = $bdd->prepare('INSERT INTO espacemembre (login, mail, pass, date_inscription, pass_temp) VALUES( :login, :mail, :passwordHash, :date, :pass_temp )');

$req->execute(compact('login', 'mail','passwordHash', 'date', 'pass_temp'));
$req->closeCursor();

setcookie('id', $pass_temp ,time()+30+24+3600, '/', $_SERVER['HTTP_HOST'], false, true);

redirection('espaceperso/moncompte.php')

?>