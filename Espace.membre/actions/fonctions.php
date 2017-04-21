<?php

function bdd()
{
    $bddDomaine = 'localhost';
    $bddNom = 'test';
    $bddLogin = 'root';
    $bddMDP = '';
    $bddHost= "mysql:host=$bddDomaine;dbname=$bddNom;charset=utf8";

    try {
        $bdd = new PDO($bddHost, $bddLogin, $bddMDP);
        return $bdd;
    }
    catch (exeption $e){
        die('erreur : ' . $e-> $getmessage());
    }

}

function recupererErreur($nomDuChamp)
{
    if (empty($_SESSION['errors'][$nomDuChamp]))
    {
        return '';
    }

    $error=  $_SESSION['errors'][$nomDuChamp];
    //unset($_SESSION['errors'][$nomDuChamp]);
    return $error;
}



function redirection($destination)
{
    header("location:".HOST."/$destination");
    die();
}



function estConnecte()
{
    $bdd = bdd();

    if (isset($_SESSION['membreId'])) {
        return true;
    }

    if (isset($_COOKIE['id'])) {
        $verifieOccurence = $bdd->prepare('SELECT id FROM espacemembre WHERE pass_temp= ?');
        $verifieOccurence->execute([$_COOKIE['id']]);
        $valideConnexion = $verifieOccurence->fetch();
        if (is_null($valideConnexion)) {
            return false;
        } else {
            $_SESSION['membreId'] = $valideConnexion['id'];
            return true;
        }
    }

    return false;

}

//
//    $valideConnexion= false;
//    if (!isset($_SESSION['membreId'])) {
//        $session_id = session_id();
//        $verifieOccurence = $bdd->prepare('SELECT session_id FROM espacemembre WHERE session_ID =?');
//        $verifieOccurence->execute([$session_id]);
//        $valideConnexion = $verifieOccurence->fetch();
//        if (!$valideConnexion) {
//            if (empty($_COOKIE['session'])) {
//                $_SESSION['errors']['connexion'] = 'Merci de vous connectez';
//            }
//            else
//            {
//                $verifieOccurence = $bdd->prepare('SELECT pass_temp FROM espacemembre WHERE pass_temp= ?');
//                $verifieOccurence->execute([$_COOKIE['session']]);
//                $valideConnexion = $verifieOccurence->fetch();
//
//                if (!$valideConnexion) {
//                    $_SESSION['errors']['connexion'] = 'Merci de vous connectez';
//
//                }
//
//            }
//
//        }
//    } else {
//        if (empty($_COOKIE['session'] or $_COOKIE['session'] == '1')) {
//            $_SESSION['errors']['connexion'] = 'Merci de vous connectez';
//
//        } else {
//            $verifieOccurence = $bdd->prepare('SELECT pass_temp FROM espacemembre WHERE pass_temp=?');
//            $verifieOccurence->execute([$_COOKIE['session']]);
//            $valideConnexion = $verifieOccurence->fetch();
//            if (!$valideConnexion) {
//                $_SESSION['errors']['connexion'] = 'Merci de vous connectez';
//            } else {
//                $session_id = session_id();
//                $pass_temp = $_COOKIE['session'];
//                //Enregistrement dans la bdd, la session, et le passe temps du cookie:
//                $req = $bdd->prepare('UPDATE espacemembre SET session_id = :session_id WHERE pass_temp = :pass_temp ');
//                $req->execute(compact('session_id', 'pass_temp'));
//                $_SESSION['connecte'] = '1';
//            }
//        }
//    }
//    return $valideConnexion;
//}
?>