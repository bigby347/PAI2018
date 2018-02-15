<?php
    include '../fonctions/access.php';
    $access=setAccess();
    if($access=="ok") {
        $title = 'Acceuil';
        $content = 'acceuil.inc.php';
        include 'header.inc.php';
        include $content;
        include 'footer.inc.php';
    }
    else{
        echo "acces non autorisé";
    }