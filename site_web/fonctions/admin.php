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
    return $data;
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
    echo '<table class="table table-bordered">
                <tr>
                    <th>IdReservation</th>
                    <th>Oeuvre</th>
                    <th>IdExemplaire</th>
                    <th>Date Reservation</th>
                    <th>Annuler</th>
                </tr>';
    $Reservations = Reservation($idUser);
    foreach ($Reservations as $Reservation) {
        echo '<tr>
                    <td>' . $Reservation['IdReservation'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['IdExemplaire'] . '</td>
                    
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeReservation" value=' . $Reservation['IdReservation'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }
    echo '</table>';


    echo '<h4 class="page-header text-info">Requête</h4>';
    echo '<table class="table table-bordered">
            <tr>
                <th>IdRequete</th>
                <th>Oeuvres</th>
                <th>Date de demande</th>
                <th>Annuler</th>
            </tr>';
    $data = Requete($idUser);
    foreach ($data as $Requete) {
        echo '<tr>
                    <td>' . $Requete['IdRequete'] . '</td>
                    <td>' . $Requete['Titre'] . '</td>
                    <td>' . $Requete['Requete'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeRequete" value=' . $Requete['IdRequete'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }
    echo '</table>';

    echo '<h4 class="page-header text-info">Emprunt en Cours</h4>';
    echo '<table class="table table-bordered">
                <tr>
                    <th>IdEmprun</th>
                    <th>IdExemplaire</th>
                    <th>Oeuvres</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Renouveller</th>
                </tr>';

    $Empruns = Emprun($idUser);
    foreach ($Empruns as $Emprun) {

        $form = '<form action = "" method="post">
                    <button type="submit" class="btn btn-primary" name="RenouvEmprun" value=' . $Emprun['IdEmprun'] . ' >Renouveller</button>
                </form>';
        if ($Emprun['Renouvelement'] == 2) {
            $form = ' ';
        }
        echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>' . $Emprun['date_Retour'] . '</td>
                    <td>
                        ' . $form . '
                    </td>
              </tr>';
    }

    echo '</table>';
    echo '</div></div>';
}

function listAutor()
{
    global $bdd;
    $req = "SELECT Nom,Prenom,IdAuteur FROM Auteur";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();

    return $data;

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
    return $data;
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

function premiereRenouv()
{
    global $bdd;
    $req = "SELECT Nom, Prenom, IdAdherant, IdEmprun, DateDemande, DatePret, IdExemplaire, IdLivre, Titre, Cote 
FROM Renouvelement, Emprun, Exemplaire, Oeuvre, Adherant
WHERE Renouvelement.FkEmprun = Emprun.IdEmprun
AND Emprun.FkExemplaire = Exemplaire.IdExemplaire
AND Exemplaire.FkLivre = Oeuvre.IdLivre
AND Adherant.IdAdherant = Emprun.FkAdherant
AND DateRetour IS NULL
AND Renouvelement = 1
ORDER BY DateDemande";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetch();
    return $data;
}

function NbreExemplaire($IdLivre)
{
    global $bdd;
    $req = "SELECT count(*) AS total
        FROM Exemplaire
        WHERE FkLivre =  ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdLivre]);

    $total = $result->fetch();

    $req = "SELECT count(*) AS dispo
    FROM Exemplaire
    LEFT JOIN Emprun ON Exemplaire.IdExemplaire = Emprun.FkExemplaire
    LEFT JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    WHERE FkLivre = ?
    AND DateRetour IS NULL
    AND IdEmprun IS NULL
    AND IdReservation IS NULL";

    $result = $bdd->prepare($req);
    $result->execute([$IdLivre]);

    $dispo = $result->fetch();

    $req = "SELECT count(*) AS demande
    FROM Requete
    WHERE FkLivre = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdLivre]);

    $demande = $result->fetch();

    return array('total' => $total['total'],
        'dispo' => $dispo['dispo'],
        'demande' => $demande['demande']);
}

function RenouvelementAccepter($IdEmprun, $IdAdherant)
{
    global $bdd;
    /* Modification de la table emprunt*/
    $req = 'UPDATE Emprun SET Renouvelement = 2 WHERE IdEmprun = ?';
    $result = $bdd->prepare($req);
    $result->execute([$IdEmprun]);
    /* Suppression dans la table emprunt*/
    $req = 'DELETE FROM Renouvelement WHERE FkEmprun = ?';
    $result = $bdd->prepare($req);
    $result->execute([$IdEmprun]);
    /* Envoie d'une notification*/
    $req = 'INSERT INTO Notif(FkAdherant,FkTypeNotif,Commentaire)
    VALUES(?,?,?)';
    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant, 11, 'Revouvelement pour le pret ' . $IdEmprun . ' ']);

}

function RenouvelementRefuser($IdEmprun, $IdAdherant)
{
    global $bdd;
    /* Suppression dans la table emprunt*/
    $req = 'DELETE FROM Renouvelement WHERE FkEmprun = ?';
    $result = $bdd->prepare($req);
    $result->execute([$IdEmprun]);
    /* Envoie d'une notification*/
    $req = 'INSERT INTO Notif(FkAdherant,FkTypeNotif,Commentaire)
    VALUES(?,?,?)';
    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant, 9, 'Revouvelement pour le pret ' . $IdEmprun . ' ']);

}

function premiereRequete()
{
    global $bdd;
    $req = 'SELECT DISTINCT IdRequete,Titre,Cote,IdAdherant,IdLivre,Nom,Prenom
    FROM Requete
    INNER JOIN Oeuvre ON Requete.FkLivre = Oeuvre.IdLivre
    INNER JOIN Adherant ON Requete.FkAdherant = Adherant.IdAdherant
    INNER JOIN Exemplaire ON Oeuvre.IdLivre = Exemplaire.FkLivre
    LEFT JOIN Emprun ON Exemplaire.IdExemplaire = Emprun.FkExemplaire
    LEFT JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    WHERE DateRetour IS NULL
    AND IdEmprun IS NULL
    AND IdReservation IS NULL';
    $result = $bdd->prepare($req);
    $result->execute([]);

    $data = $result->fetch();
    return $data;
}

function ExemplaireDispo($Idlivre)
{
    global $bdd;
    $req = 'SELECT IdExemplaire,Achat
    FROM Exemplaire
    LEFT JOIN Emprun ON Exemplaire.IdExemplaire = Emprun.FkExemplaire
    LEFT JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    WHERE FkLivre = ?
    AND DateRetour IS NULL
    AND IdEmprun IS NULL
    AND IdReservation IS NULL';
    $result = $bdd->prepare($req);
    $result->execute([$Idlivre]);

    $data = $result->fetchAll();
    return $data;
}

function ValidationRequete($IdRequete, $IdAdherant, $IdExempalire)
{

}