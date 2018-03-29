<?php
include 'config_bdd.php';
function printAuteur($recherche)
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th></th>
            </tr>';
    $req = "SELECT IdAuteur, Nom, Prenom, CONCAT(Nom,' ',Prenom) AS R1, CONCAT(Prenom,' ',Nom) AS R2
    FROM Auteur " . $recherche;

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $Auteur) {
        echo '<tr>
                    <td>' . $Auteur['Nom'] . '</td>
                    <td>' . $Auteur['Prenom'] . '</td>
                    <td>' . '<form action = "?page=catalogue" method="post">
                        <button type="submit" class="btn btn-primary" name="RechAvAuteur" value=' . $Auteur['IdAuteur'] . ' >Voir ses oeuvres</button>
                        </form>' . '</td></tr>';
    }

    echo '</table>';
}

function printMotsClef()
{
    global $bdd;

    echo '
            <select multiple size="10" class="form-control" name="MC[]">';

    $req = "SELECT * FROM MotClef";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $MotClef) {
        echo '<option value=' . $MotClef['IdMotClef'] . ' >' . $MotClef['Nom'] . '</option>';
    }

    echo '</select>';
}


function Catalogue($where, $whereMC)
{
    global $bdd;

    $req = "SELECT DISTINCT IdLivre,Titre,Cote,Publication,Auteurs, MotClefs, Description FROM(
SELECT IdLivre,Titre,Cote,Publication,Auteurs,group_concat(MotClef.Nom, ' ') AS MotClefs,Description
FROM (SELECT Oeuvre.IdLivre,
Oeuvre.Titre,
Oeuvre.Cote,
Oeuvre.Publication,
group_concat(Auteur.Nom, ' ' , Auteur.Prenom , ' ') AS Auteurs,
Oeuvre.Description
FROM Oeuvre
LEFT JOIN Ecrit ON Oeuvre.IdLivre = Ecrit.FkLivre
LEFT JOIN Auteur ON Ecrit.FkAuteur = Auteur.IdAuteur 
" . $where . "
GROUP BY Oeuvre.IdLivre) AS TMP
LEFT JOIN Definition ON TMP.IdLivre = Definition.FkLivre
LEFT JOIN MotClef ON Definition.FkMotClef = MotClef.IdMotClef 
" . $whereMC . "
GROUP BY TMP.IdLivre) as T, Exemplaire
Where FkLivre=IdLivre";
    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    return $data;
}

function printRequete($IdAdherant)
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdRequete</th>
                <th>Oeuvres</th>
                <th>Date de demande</th>
                <th>Annuler</th>
            </tr>';
    $req = "SELECT IdRequete, Titre, Requete, IdLivre
    FROM Requete, Oeuvre, Adherant 
    WHERE Oeuvre.IdLivre = Requete.FkLivre
    AND Requete.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
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
}

function printReservation($IdAdherant)
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdReservation</th>
                <th>Oeuvre</th>
                <th>IdExemplaire</th>
                <th>Date Reservation</th>
                <th>Annuler</th>
            </tr>';
    $req = "SELECT Titre, DateAcceptation, IdExemplaire, IdReservation
    FROM Reservation, Oeuvre, Adherant, Exemplaire
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Reservation.FkExemplaire
    AND Reservation.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    foreach ($data as $Reservation) {
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
}

function printEmprun($IdAdherant)
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdEmprun</th>
                <th>IdExemplaire</th>
                <th>Oeuvres</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Renouveller</th>
            </tr>';
    $req = "SELECT IdEmprun, IdExemplaire, Titre, DatePret,Renouvelement ,IF(Renouvelement=2,DATE_ADD(DatePret, INTERVAL (2) MONTH),DATE_ADD(DatePret, INTERVAL (1) MONTH))AS date_Retour
    FROM Emprun, Exemplaire, Oeuvre, Adherant 
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Emprun.FkExemplaire
    AND Emprun.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?
    AND Emprun.DateRetour IS NULL";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    foreach ($data as $Emprun) {

        $form = '<form action = "" method="post">
                    <button type="submit" class="btn btn-primary" name="RenouvEmprun" value=' . $Emprun['IdEmprun'] . ' >Renouveller</button>
                </form>';
        if ($Emprun['Renouvelement'] == 2){
            $form = ' ';
        }
        echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>' . $Emprun['date_Retour'] . '</td>
                    <td>
                        '.$form.'
                    </td>
              </tr>';
    }

    echo '</table>';
}

function printHistorique($IdAdherant)
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdEmprun</th>
                <th>IdExemplaire</th>
                <th>Oeuvres</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>';
    $req = "SELECT IdEmprun, IdExemplaire, Titre, DatePret,DATE_ADD(DatePret, INTERVAL 1 MONTH) AS date_Retour
    FROM Emprun, Exemplaire, Oeuvre, Adherant 
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Emprun.FkExemplaire
    AND Emprun.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?
    AND Emprun.DateRetour IS NOT NULL;";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    foreach ($data as $Emprun) {
        echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>' . $Emprun['date_Retour'] . '</td>
              </tr>';
    }

    echo '</table>';
}

function printNotif($IdAdherant)
{
    global $bdd;

    echo '<table class="table">
            <tr>
                <th>IdNotif</th>
                <th>Type</th>
                <th>Commentaire</th>
                <th>Suprimmer</th>
            </tr>';
    $req = "SELECT IdNotif, TypeNotif.Nom AS Type, Commentaire
FROM Notif, TypeNotif , Adherant 
WHERE IdAdherant = ?
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; ";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    foreach ($data as $Notif) {
        echo '<tr>
                    <td>' . $Notif['IdNotif'] . '</td>
                    <td>' . $Notif['Type'] . '</td>
                    <td>' . $Notif['Commentaire'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeNotif" value=' . $Notif['IdNotif'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }

    echo '</table>';
}

function printAdmin()
{
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
            </tr>';
    $req = "SELECT Nom, Prenom, Mail FROM Admin";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    foreach ($data as $Notif) {
        echo '<tr>
                    <td>' . $Notif['Nom'] . '</td>
                    <td>' . $Notif['Prenom'] . '</td>
                    <td>' . $Notif['Mail'] . '</td>
              </tr>';
    }

    echo '</table>';
}


function AjoutRequete($IdLivre, $IdAdherant)
{
    global $bdd;
    $req1 = "INSERT INTO Requete(FkLivre,FkAdherant,Requete)
    VALUES(?,?,STR_TO_DATE(?, '%d-%m-%Y'));";

    $result = $bdd->prepare($req1);
    $result->execute([$IdLivre, $IdAdherant, date('d-m-Y')]);

    $req = 'INSERT INTO Notif(FkAdherant,FkTypeNotif,Commentaire)
    VALUES(?,?,?)';
    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant, 2, 'Requete enregistrée pour le livre ' . $IdLivre]);

}


function SupprimeRequete($IdRequete)
{
    global $bdd;
    $req = "DELETE FROM Requete 
      WHERE IdRequete = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdRequete]);

    //echo '<br> La requète a bien été suprimmé';
}

function SupprimeReservation($IdReservation)
{
    global $bdd;
    $req = "DELETE FROM Reservation
      WHERE IdReservation = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdReservation]);
}


function RenouvEmprun($IdEmprun, $IdAdherant)
{
    global $bdd;
    $req1 = "INSERT INTO Renouvelement(FkEmprun,DateDemande)
    VALUES(?,STR_TO_DATE(?, '%d-%m-%Y'));";

    $result = $bdd->prepare($req1);
    $result->execute([$IdEmprun, date('d-m-Y')]);

    $req = 'INSERT INTO Notif(FkAdherant,FkTypeNotif,Commentaire)
    VALUES(?,?,?)';
    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant, 10, 'Requete de renouvelement enregistrée pour l emprun ' . $IdEmprun]);


}


function SupprimeNotif($IdNotif)
{
    global $bdd;
    $req = "DELETE FROM Notif
      WHERE IdNotif = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdNotif]);
}
