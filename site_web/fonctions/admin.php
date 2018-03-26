<?php
include '../fonctions/user.php';
function register()
{
    global $bdd;
    if (isset($_POST['inscription'])) {

        $mail = strtolower($_POST['mail']);
        $nom = strtolower($_POST['nom']);
        $prenom = strtolower($_POST['prenom']);
        $mdp = strtolower($nom . $prenom);
        $adresse = $_POST['adresse'];
        $adhesion = date("d-m-Y");
        $cotisation = (isset($_POST['cotisation'])) ? $_POST['cotisation'] : NULL;
        $req = 'INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation) VALUES(?,?,?,?,?,STR_TO_DATE(?, \'%d-%m-%Y\'),STR_TO_DATE(?, \'%d-%m-%Y\'))';
        $result = $bdd->prepare($req);
        if ($cotisation == '' || $cotisation == NULL) {
            $result->execute([$mail, $nom, $prenom, $mdp, $adresse, $adhesion, NULL]);
        } else {
            $result->execute([$mail, $nom, $prenom, $mdp, $adresse, $adhesion, $cotisation]);
        }
    }
}

function listUser()
{
    global $bdd;
    $find = '';
    if (isset($_POST['rechercher']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
        $find = "WHERE Nom = '" . $_POST['nom'] . "' AND Prenom ='" . $_POST['prenom'] . "'";
    }
    $req = 'SELECT IdAdherant,Nom,Prenom,Mail,Adresse,adhesion,cotisation FROM Adherant ' . $find;
    $result = $bdd->prepare($req);
    $result->execute();
    $data = $result->fetchAll();
    foreach ($data as $user) {
        echo '<tr>
                    <td>' . $user['IdAdherant'] . '</td>
                    <td>' . $user['Nom'] . '</td>
                    <td>' . $user['Prenom'] . '</td>
                    <td>' . $user['Mail'] . '</td>
                    <td>' . $user['Adresse'] . '</td>
                    <td>' . $user['adhesion'] . '</td>
                    <td>' . $user['cotisation'] . '</td>
                    <td>
                        <form action = "" method="post">
                            <button type="submit" class="btn btn-primary" name="profile" value=' . $user['IdAdherant'] . ' >Voir Profil</button>
                        </form>
                    </td>
                 </tr>';
    }
}

function printProfile($idUser)
{
    global $bdd;
    $req = 'SELECT IdAdherant,Nom,Prenom,Mail,Adresse,adhesion,cotisation FROM Adherant WHERE IdAdherant =' . $idUser;
    $result = $bdd->prepare($req);
    $result->execute();
    $dataUser = $result->fetch();
    echo '
            <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-3 main panel panel-primary">
                <h2 class="page-header text-primary text-center">Profil utilisateur</h2>
                <div class="container-fluid col-lg-6 col-lg-offset-3 text-center">
                     <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>' . $dataUser['Nom'] . ' ' . $dataUser['Prenom'] . '</h3>
                    </div>
                <div class="panel-body">
                        <h5>ID Utilisateurs: ' . $dataUser['IdAdherant'] . '</h5>
                        <h5>Email: ' . $dataUser['Mail'] . '</h5>
                        <h5>Adresse : ' . $dataUser['Adresse'] . '</h5>
                        <h5>Adhesion : ' . $dataUser['adhesion'] . '</h5>
                        <h5>Cotisation : ' . $dataUser['cotisation'] . '</h5>
                </div>
            </div>
                </div>
                <div class="container-fluid col-lg-12">';

    echo '<h4 class="page-header text-info">Historique Emprunt</h4>';
    printHistorique($idUser);
    echo '<h4 class="page-header text-info">Demande de Réservation</h4>';
    printReservation($idUser);
    echo '<h4 class="page-header text-info">Requête</h4>';
    printRequete($idUser);
    echo '<h4 class="page-header text-info">Emprunt en Cours</h4>';
    printEmprun($idUser);
    echo '</div></div>';
}

function listAutor()
{
    global $bdd;
    $req = "SELECT Nom,Prenom,IdAuteur FROM Auteur";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $list) {
        echo '<option data-subtext="' . $list['Prenom'] . '" value="' . $list['IdAuteur'] . '">' . $list['Nom'] . '</option>';
    }

}

function addBook()
{
    global $bdd;
    if (isset($_POST['addBook'])) {
        $titre = $_POST['titre'];
        $datePub = $_POST['datePub'];
        $cote = $_POST['cote'];
        $description = $_POST['description'];
        $list_autor = $_POST['select_auteur'];
        $req = 'INSERT INTO Oeuvre(Titre, Cote, Publication,Description)
            VALUES (?,?,?,?)';
        $result = $bdd->prepare($req);
        $result->execute([$titre, $cote, $datePub, $description]);
        $id_livre = $bdd->lastInsertId();
        foreach ($list_autor as $autor) {
            $req = 'INSERT INTO Ecrit(FkAuteur,FkLivre)
            VALUES (?,?)';
            $result = $bdd->prepare($req);
            $result->execute([$autor, $id_livre]);
        }
    }

}

function listBook()
{
    global $bdd;
    $req = "SELECT IdLivre,Titre FROM Oeuvre";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $list) {
        echo '<option data-subtext="' . $list['IdLivre'] . '" value="' . $list['IdLivre'] . '">' . $list['Titre'] . '</option>';
    }
}

function addExemplaire()
{
    global $bdd;

    if (isset($_POST['addExemplaire'])) {
        $date = $_POST['dateAchat'];
        $nbExem = $_POST['nbExemp'];
        $idLivre = $_POST['select_livre'];
        $req = 'INSERT INTO Exemplaire(Achat,FkLivre) VALUES(?,?)';
        $result = $bdd->prepare($req);
        for ($i = 0; $i < $nbExem; $i++) {
            $result->execute([$date, $idLivre]);
        }

    }
}

function addAutor()
{
    global $bdd;

    if (isset($_POST['addAutor'])) {
        $req = 'INSERT INTO Auteur(Nom,Prenom) VALUES(?,?)';
        $result = $bdd->prepare($req);
        $nom = $_POST['nomAuteur1'];
        $prenom = $_POST['prenomAuteur1'];
        $result->execute([$nom, $prenom]);
    }
}

function printDemandeReservation()
{ //TODO
    global $bdd;


    $req = 'SELECT Nom,Prenom,Titre,IdAdherant,Requete
          FROM Adherant,Requete,Oeuvre
          WHERE Requete.FkAdherant = Adherant.IdAdherant
          AND Requete.FkLivre = Oeuvre.IdLivre';
    $result = $bdd->prepare($req);
    $result->execute();
    $data = $result->fetchAll();
    foreach ($data as $requete) {
        echo '<tr>
                    <td>' . $requete['IdAdherant'] . '</td>
                    <td>' . $requete['Nom'] . '</td>
                    <td>' . $requete['Prenom'] . '</td>
                    <td>' . $requete['Titre'] . '</td>
                    <td>' . $requete['Requete'] . '</td>
                    <td>
                        <form action ="" method="post">
                            <button type="submit" class="btn btn-primary" name="accepter" value=' . $requete['IdAdherant'] . ' >Voir Profil</button>
                        </form>
                    </td>
                 </tr>';
    }
}

function printDemandeRenouvelement()
{   //TODO
    global $bdd;
    $req = '';
    $result = $bdd->prepare($req);
    $result->execute();
    $data = $result->fetchAll();
    foreach ($data as $user) {
        echo '<tr>
                    <td>' . $user['IdAdherant'] . '</td>
                    <td>' . $user['Nom'] . '</td>
                    <td>' . $user['Prenom'] . '</td>
                    <td>' . $user['Mail'] . '</td>
                    <td>' . $user['Adresse'] . '</td>
                    <td>' . $user['adhesion'] . '</td>
                    <td>' . $user['cotisation'] . '</td>
                    <td>
                        <form action = "" method="post">
                            <button type="submit" class="btn btn-primary" name="profile" value=' . $user['IdAdherant'] . ' >Voir Profil</button>
                        </form>
                    </td>
                 </tr>';
    }
}