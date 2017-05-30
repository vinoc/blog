<?php

$titrePage= (isset($titrePage)) ? $titrePage : 'Blog de l\'ecrivain ' ;

if (isset($membreConnecte)) {
    var_dump($membreConnecte->estAdmin());
    die;
    $visibiliteNouveauArticle = ($membreConnecte->estAdmin() OR $membreConnecte->estAuteur()) ? 'visible' : 'cache';
}
else {
    $visibiliteNouveauArticle = 'cache';
}

if (isset($membreConnecte)) {
    $visibiliteAdmin = ($membreConnecte->estAdmin()) ? 'visible' : 'cache';
}
else {
    $visibiliteAdmin = 'cache';
}
include(PARTIAL_PATH.'_header_menu.php');

?>