<?php

$titrePage= (isset($titrePage)) ? $titrePage : 'Blog de l\'ecrivain ' ;

if (isset($membreConnecte)) {
    $visibilite = ($membreConnecte->estAdmin() OR $membreConnecte->estAuteur()) ? 'visible' : 'cache';
}
else {
    $visibilite = 'cache';
}

require (PARTIAL_PATH.'_header_menu.php');