<?php

if (estConnecte()== false)
{redirection('connexion.php');}
else
{
    $membreConnecte = newMembre($_SESSION['membreId']);
}
