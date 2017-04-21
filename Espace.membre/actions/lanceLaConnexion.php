<?php session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

$bdd =bdd();
$login= trim($_POST['login']);
$password= $_POST['password'];


$verifieOccurence = $bdd->prepare('SELECT login, pass FROM espacemembre WHERE login = ?');
$verifieOccurence->execute([$login]);
$valideConnexion = $verifieOccurence->fetch();

//Si erreur, retour page de connexion
if(!password_verify($password, $valideConnexion['pass'])){
    $_SESSION['errors']['connexion']='Login ou mot de passe incorrect' ;
    redirection('connexion.php');
}
else{
    $pass_temp= uniqid('', true);

    setcookie('id', $pass_temp ,time()+30+24+3600, '/', $_SERVER['HTTP_HOST'], false, true);

    //Enregistrement dans la bdd, la session, et le passe temps du cookie:
    $req = $bdd->prepare('UPDATE espacemembre SET pass_temp = :pass_temp WHERE login = :login ');

    $req->execute(compact('pass_temp','login'));
    $_SESSION['membreId']= $valideConnexion['id'];

    header('location: ../moncompte.php');
 }
?>