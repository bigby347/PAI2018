<?php
$pagesUser = array(
    'acceuil' => array(
        'title'=>'Accueil',
        'include'=> 'acceuil.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'catalogue' => array(
        'title'=>'Catalogue',
        'include'=> 'catalogue.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Liste des livres de la bibliothèque'),
    'compte' => array(
        'title'=>'Mon compte',
        'include'=> 'compte.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'notification' => array(
        'title'=>'Mes notifications',
        'include'=> 'notification.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Liste de vos notifications'),
    'renouvelement' => array(
        'title' => 'Demande de Renouvelement',
        'include' => 'renouvelement.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'historique' => array(
        'title' => 'Historique',
        'include' => 'historique.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Historique de vos préts'),
    'A propo' => array(
        'title'=>'A propos',
        'include'=> 'contact.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Détails sur la bibliothèque'),
    'auteur' => array(
        'title'=>'Auteur',
        'include'=> 'auteur.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'motClef' => array(
        'title'=>'Recherche par mot clef',
        'include'=> 'motClef.inc.php',
        'printMenu' => FALSE,
        'detail' => ' ')



);
$pagesAd = array(
    'acceuil' => array(
        'title'=>'Accueil',
        'include'=> 'portail.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'catalogue' => array(
        'title'=>'Catalogue',
        'include'=> 'catalogue.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Les livres de la bibliothèque'),
    'inscription' => array(
        'title'=>'Inscriptions Utilisateurs',
        'include'=> 'inscription.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Ajout d\'utilisateur'),
    'utilisateurs' => array(
        'title'=>'Utilisateurs',
        'include'=> 'user_panel.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Liste des utilisateurs et de leurs détails'),
    'liste' => array(
        'title'=>'Liste utilisateurs',
        'include'=> 'user_list.inc.php',
        'printMenu' => FALSE,
        'detail' => ' '),
    'addbook' => array(
        'title' => 'Ajout Livre',
        'include' => 'add_book.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Ajout des nouvelles oeuvres et de leur auteurs'),
    'GesEx' => array(
        'title' => 'Gestion exemplaire',
        'include' => 'GestionExemplaire.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Ajout et supression des exemplaires'),
    'addpret' => array(
        'title' => 'Enregistrement pret',
        'include' => 'add_pret.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Gestions des emprunt au sein de la bibliothèque'),
    'demande' => array(
        'title' => 'Gestions des requètes',
        'include' => 'GestionRequete.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Permet de gérés les demandes faites sur le site web'),
    'reservation' => array(
        'title' => 'Gestions des reservation',
        'include' => 'GestionReservation.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Recupérations des réservations par un clients'),
    'Retour' => array(
        'title' => 'Gestions des emprunts',
        'include' => 'GestionEmprun.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Gestion des retours'),
    'renouv' => array(
        'title' => 'Gestion des renouvelements',
        'include' => 'GestionRenouvelement.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Gestions des demandes de renouvelement'),
    'notification' => array(
        'title' => 'Notification',
        'include' => 'add_notif.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Envoi de notifications'),
    'cotisation'=> array(
        'title' => 'Gestion des cotisations',
        'include' => 'cotisation.inc.php',
        'printMenu' => TRUE,
        'detail' => 'Gestion des cotisations des adhérants')
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
            echo '<li class="active"><a href="?page=' . $menu . '" title = "'.$info['detail'].'">' . $info['title'] . '</a></li>';
        }
    }
}

function printTitle(){
    global $title;
    echo $title;
}