<?php 

function chargerClasse($classe)
{
    require RACINE_SRV.'/class/' .$classe .'.php'; // On inclut la classe correspondante au paramètre passé. Le fichier doit porter le nom de la class qu'il contient !
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

function recupererErreur($nomDuChamp)
{
    if (empty($_SESSION['errors'][$nomDuChamp]))
    {
        return '';
    }

    $error=  $_SESSION['errors'][$nomDuChamp];
    unset($_SESSION['errors'][$nomDuChamp]);
    return $error;
}

function estConnecte()
{
    $bdd = bdd();

    if (isset($_SESSION['membreId'])) {
       // return true;
    }


    if (isset($_COOKIE['id'])) {
        $verifieOccurence = $bdd->prepare('SELECT id, pass_temp FROM espacemembre WHERE pass_temp= ?');
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

?>