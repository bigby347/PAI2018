<?php
include 'config_bdd.php';

function register(){
    global $bdd;
    if(isset($_POST['inscription'])){

        $mail = strtolower(htmlentities($_POST['mail'], ENT_QUOTES, "ISO-8859-1"));
        $nom = strtolower(htmlentities($_POST['nom'], ENT_QUOTES, "ISO-8859-1"));
        $prenom = strtolower(htmlentities($_POST['prenom'], ENT_QUOTES, "ISO-8859-1"));
        $mdp = strtolower($nom.$prenom);
        $adresse = htmlentities($_POST['adresse'], ENT_QUOTES, "ISO-8859-1");
        $adhesion = date("d-m-Y");
        $cotisation = (isset($_POST['cotisation'])) ? htmlentities($_POST['cotisation'], ENT_QUOTES, "ISO-8859-1") : NULL ;
        $req='INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation) VALUES(?,?,?,?,?,STR_TO_DATE(?, \'%d-%m-%Y\'),STR_TO_DATE(?, \'%d-%m-%Y\'))';
        $result=$bdd->prepare($req);
        if($cotisation == '' || $cotisation == NULL){
            $result->execute([$mail,$nom,$prenom,$mdp,$adresse,$adhesion,NULL]);
        }
        else{
            $result->execute([$mail,$nom,$prenom,$mdp,$adresse,$adhesion,$cotisation]);
        }
    }
}

function listUser(){
    global $bdd;
    $find='';
    if(isset($_POST['rechercher']) && !empty($_POST['nom']) && !empty($_POST['prenom']) ){
        $find="WHERE Nom = '".$_POST['nom']."' AND Prenom ='".$_POST['prenom']."'";
    }
    $req = 'SELECT IdAdherant,Nom,Prenom,Mail,Adresse,adhesion,cotisation FROM Adherant '. $find;
    $result=$bdd->prepare($req);
    $result->execute();
    $data=$result->fetchAll();
    foreach ($data as $catalogue){
        echo '<tr>
                    <td>'.$catalogue['IdAdherant'].'</td>
                    <td>'.$catalogue['Nom'].'</td>
                    <td>'.$catalogue['Prenom'].'</td>
                    <td>'.$catalogue['Mail'].'</td>
                    <td>'.$catalogue['Adresse'].'</td>
                    <td>'.$catalogue['adhesion'].'</td>
                    <td>'.$catalogue['cotisation'].'</td>
                 </tr>';
    }
}

function listAutor()
{
    global $bdd;
    $req = "SELECT Nom,Prenom,IdAuteur FROM Auteur";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $list) {
        echo '<option data-subtext="'. $list['Prenom'] .'" value="'.$list['IdAuteur'].'">' . $list['Nom'] . '</option>';
    }

}

function addBook(){
    global $bdd;
    $listAuteur ='';

    if(isset($_POST['addBook'])){
        $titre = strtolower(htmlentities($_POST['titre'], ENT_QUOTES, "ISO-8859-1"));
        $datePub = htmlentities($_POST['datePub'], ENT_QUOTES, "ISO-8859-1");
        $cote = htmlentities($_POST['cote'], ENT_QUOTES, "ISO-8859-1");
        for($i=1;$i=$_POST['nbAuteur'];$i++){
            if($i==1){
                $listAuteur .= $_POST['nomAuteur'.$i].' '.$_POST['nomAuteur'.$i];
            }
            else{
                $listAuteur .= ','.$_POST['nomAuteur'.$i].' '.$_POST['nomAuteur'.$i];
            }
        }
        $req = 'INSERT INTO Oeuvre(Titre, Cote, Publication)
            VALUES (?,?,?)';
        $result=$bdd->prepare($req);
        $result->execute([$titre,$cote,$datePub]);
    }

}

function addAutor()
{
    global $bdd;

    if (isset($_POST['addAutor'])) {
        $cmp = $_POST['nbAuteur'];
        $req = 'INSERT INTO Auteur(Nom,Prenom) VALUES(?,?)';
        $result = $bdd->prepare($req);
        if ($cmp > 1) {
            for ($i = 1; $i < $cmp+1; $i++) {
                $nom = $_POST['nomAuteur' . $i];
                $prenom = $_POST['prenomAuteur' . $i];
                $result->execute([$nom, $prenom]);
            }
            var_dump($cmp);

        } else {
            $nom = $_POST['nomAuteur1'];
            $prenom = $_POST['prenomAuteur1'];
            $result->execute([$nom, $prenom]);
        }
        header("location : portail_admin.php?page=addbook");
    }
}