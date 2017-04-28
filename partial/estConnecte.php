<?php

if (estConnecte()== false)
{
    redirection('connexion.php');
    die();
}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}
