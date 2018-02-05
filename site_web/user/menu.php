<?php 
    $pages = array(
        'acceuil' => array(
            'title'=>'Accueil',
            'include'=> 'acceuil.inc.php'),
        'catalogue' => array(
            'title'=>'Catalogue',
            'include'=> 'catalogue.inc.php'),
        'contact' => array(
            'title'=>'Contact',
            'include'=> 'contact.inc.php'),
        );
    if(empty($_GET['page']==TRUE)){
        $content = $pages['acceuil']['include'];
        $title = $pages['acceuil']['title'];
    }    
    foreach($pages as $current_page=>$info){
        if($_GET['page'] == $current_page ){
            $content = $info['include'];
            $title = $info['title'];
        }
    }
?>