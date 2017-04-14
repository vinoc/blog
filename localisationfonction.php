<?php

$host = 'http://'.$_SERVER['HTTP_HOST'].'';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
$racine_srv= $_SERVER['DOCUMENT_ROOT'].'';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
$fonction_path =  $_SERVER['DOCUMENT_ROOT'].'/fonctions/';
//Lien en 127.0.0.1....
$fonction_URL= $host.'/fonctions/';


// constante:
define("HOST", $host );
define("RACIN_SRV", $racine_srv );
define("FONCTION_PATH", $fonction_path );
define("FONCTION_URL", $fonction_URL );


?>