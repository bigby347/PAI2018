<?php 
    $pages = array(
        'acceuil' => array(
            'title'=>'Accueil',
            'include'=> 'acceuil.inc.php',
            'printMenu' => FALSE),
        'catalogue' => array(
            'title'=>'Catalogue',
            'include'=> 'catalogue.inc.php',
            'printMenu' => TRUE),
        'contact' => array(
            'title'=>'Contact',
            'include'=> 'contact.inc.php',
            'printMenu' => TRUE),
        'compte' => array(
            'title'=>'Mon compte',
            'include'=> 'compte.inc.php',
            'printMenu' => FALSE),
        );

    function getPages(){
        global $content;
        global $title;
        global $pages;


        if(empty($_GET['page']==TRUE)){
            $content = $pages['acceuil']['include'];
            $title = $pages['acceuil']['title'];
        }
        foreach($pages as $current_page=>$info) {
            if ($_GET['page'] == $current_page) {
                $content = $info['include'];
                $title = $info['title'];
            }
        }
    }


    function printMenu()
    {
        global $pages;
        foreach ($pages as $menu => $info) {
            if ($info['printMenu'] == TRUE) {
                echo '<li class="active"><a href="?page=' . $menu . '">' . $info['title'] . '</a></li>';
            }
        }
    }


    function printTitle(){
        global $title;
        echo $title;
    }