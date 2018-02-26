<?php
    include '../fonctions/access.php';
    $access=setAccess();
    if($access=="ok") {
        $title = 'Portail admin';
        $content = 'portail.inc.php';
        include 'header.inc.php';
        include 'menu.inc.php';
        include $content;
        include 'footer.inc.php';
    }
    else{
        echo "acces non autorisé";
        sleep(5);
        header('Location: ../index.php');
    }