<?php
$pagesUser = array(
    'acceuil' => array(
        'title'=>'Accueil',
        'include'=> 'acceuil.inc.php',
        'printMenu' => FALSE),
    'catalogue' => array(
        'title'=>'Catalogue',
        'include'=> 'catalogue.inc.php',
        'printMenu' => TRUE),
    'compte' => array(
        'title'=>'Mon compte',
        'include'=> 'compte.inc.php',
        'printMenu' => FALSE),
    'notification' => array(
        'title'=>'Mes notifications',
        'include'=> 'notification.inc.php',
        'printMenu' => TRUE),
    'renouvelement' => array(
        'title' => 'Demande de Renouvelement',
        'include' => 'renouvelement.inc.php',
        'printMenu' => FALSE),
    'historique' => array(
        'title' => 'Historique',
        'include' => 'historique.inc.php',
        'printMenu' => TRUE),
    'A propo' => array(
        'title'=>'A propo :',
        'include'=> 'contact.inc.php',
        'printMenu' => TRUE),
    'auteur' => array(
        'title'=>'Auteur',
        'include'=> 'auteur.inc.php',
        'printMenu' => FALSE),
    'motClef' => array(
        'title'=>'Recherche par mot clef',
        'include'=> 'motClef.inc.php',
        'printMenu' => FALSE)



);
$pagesAd = array(
    'acceuil' => array(
        'title'=>'Accueil',
        'include'=> 'portail.inc.php',
        'printMenu' => FALSE),
    'catalogue' => array(
        'title'=>'Catalogue',
        'include'=> 'catalogue.inc.php',
        'printMenu' => TRUE),
    'inscription' => array(
        'title'=>'Inscriptions Utilisateurs',
        'include'=> 'inscription.inc.php',
        'printMenu' => TRUE),
    'utilisateurs' => array(
        'title'=>'Utilisateurs',
        'include'=> 'user_panel.inc.php',
        'printMenu' => TRUE),
    'liste' => array(
        'title'=>'Liste utilisateurs',
        'include'=> 'user_list.inc.php',
        'printMenu' => FALSE),
    'addbook' => array(
        'title' => 'Ajout Livre',
        'include' => 'add_book.inc.php',
        'printMenu' => TRUE),
    'GesEx' => array(
        'title' => 'Gestion exemplaire',
        'include' => 'GestionExemplaire.inc.php',
        'printMenu' => TRUE),
    'addpret' => array(
        'title' => 'Enregistrement pret',
        'include' => 'add_pret.inc.php',
        'printMenu' => TRUE),
    'demande' => array(
        'title' => 'Gestions des requètes',
        'include' => 'GestionRequete.inc.php',
        'printMenu' => TRUE),
    'reservation' => array(
        'title' => 'Gestions des reservation',
        'include' => 'GestionReservation.inc.php',
        'printMenu' => TRUE),
    'renouv' => array(
        'title' => 'Gestion des renouvelements',
        'include' => 'GestionRenouvelement.inc.php',
        'printMenu' => TRUE),
    'notification' => array(
        'title' => 'Notification',
        'include' => 'add_notif.inc.php',
        'printMenu' => TRUE),
    'contisation'=> array(
        'title' => 'Gestion des cotisations',
        'include' => 'cotisation.inc.php',
        'printMenu' => TRUE)
);

function select($sel){
    global $pagesUser,$pagesAd;
    $ret=array();
    switch ($sel){
        case 'user': $ret=$pagesUser;
                     break;
        case 'admin': $ret=$pagesAd;
                     break;
        default : break;
    }
    return $ret;
}

function getPages($page){
    global $content;
    global $title;

    $pages = select($page);
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


function printMenu($page)
{
    $pages=select($page);
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