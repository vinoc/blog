<?php
function bdd()
{
    $bddDomaine = 'localhost';
    $bddNom = 'test';
    $bddLogin = 'root';
    $bddMDP = '';
    $bddHost= "mysql:host=$bddDomaine;dbname=$bddNom;charset=utf8";

    try {
        $bdd = new PDO($bddHost, $bddLogin, $bddMDP,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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

function connexion($login,$motDePasse)
{

    $connexion= new MembreManager(bdd());
    var_dump($connexion->connectionMembre($login, $motDePasse));
    die();
   // ($connexion->connectionMembre($login,$motDePasse)) ? redirection('index.php') : '' ;
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



function chargerClasse($classe)
{
    require RACINE_SRV.'/class/' .$classe .'.php'; // On inclut la classe correspondante au paramètre passé. Le fichier doit porter le nom de la class qu'il contient !
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.




function newMembre($id)

{
    $bdd= bdd();
    $id = (int)$id;

    $q = $bdd->prepare('SELECT id, login, status FROM espacemembres WHERE id = ?');
    $q->execute([$id]);
    echo $id.'<br />';

    $donnees = $q->fetch();
    if($donnees == false){
        return false;
    }
    return new membre($donnees);
}




?>