<?php
session_start();
require ('../localisationfonction.php');
require (FONCTION_PATH.'fonctions.php');

$bdd = bdd();
$cookieId = (isset($_COOKIE['id'])) ? $_COOKIE['id'] : '';

//destruction des traces de la session dans la bdd
$req = $bdd->prepare('UPDATE espacemembres SET pass_temp = ? WHERE pass_temp = ?  ');

$req->execute(['',$cookieId,]);

//On fait expirer le cookie, et on change l'id de session. plus aucune trace :)
setcookie('id', '1', time() +1 , '/', $_SERVER['HTTP_HOST'], false, true);

//On efface la session en cours
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
session_regenerate_id(true);

redirection('index.php');

?>