<?php

$host = 'http://'.$_SERVER['HTTP_HOST'].'/essais/Espace.membre';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
$racinesrv= $_SERVER['DOCUMENT_ROOT'].'/essais/Espace.membre';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
$fonction_path =  $_SERVER['DOCUMENT_ROOT'].'/essais/Espace.membre/actions/';
//Lien en 127.0.0.1....
$fonction_URL= $host.'/actions/';


// constante:
define("HOST", $host );
define("RACINSRV", $racinesrv );
define("FONCTION_PATH", $fonction_path );
define("FONCTION_URL", $fonction_URL );

?>