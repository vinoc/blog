<?php

$host = 'http://'.$_SERVER['HTTP_HOST'].'/blog';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
$racine_srv= $_SERVER['DOCUMENT_ROOT'].'/blog';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )


$fonction_path =  $racine_srv.'/fonctions/';
//Lien en 127.0.0.1....
$fonction_URL= $host.'/fonctions/';
//Vers le dossier class
$partial_path= $racine_srv.'/blog/partial/]


// constante:
define("HOST", $host );
define("RACINE_SRV", $racine_srv );
define("FONCTION_PATH", $fonction_path );
define("FONCTION_URL", $fonction_URL );
define("PARTIAL_PATH", $partial_path );


?>