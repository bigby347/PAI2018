<?php
include 'config_bdd.php';
function Auteur($recherche)
{
    global $bdd;

    echo '';
    $req = "SELECT IdAuteur, Nom, Prenom, CONCAT(Nom,' ',Prenom) AS R1, CONCAT(Prenom,' ',Nom) AS R2
    FROM Auteur " . $recherche;

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    return $data;

}

function MotsClef()
{
    global $bdd;


    $req = "SELECT * FROM MotClef";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    return $data;


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

function Requete($IdAdherant)
{
    global $bdd;

    $req = "SELECT IdRequete, Titre, Requete, IdLivre
    FROM Requete, Oeuvre, Adherant 
    WHERE Oeuvre.IdLivre = Requete.FkLivre
    AND Requete.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    return $data;

}

function Reservation($IdAdherant)
{
    global $bdd;


    $req = "SELECT Titre, DateAcceptation, IdExemplaire, IdReservation
    FROM Reservation, Oeuvre, Adherant, Exemplaire
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Reservation.FkExemplaire
    AND Reservation.FkAdherant = Adherant.IdAdherant
    AND Adherant.IdAdherant = ?";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    return $data;


    echo '</table>';
}

function Emprun($IdAdherant)
{
    global $bdd;


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
    return $data;


}

function Historique($IdAdherant)
{
    global $bdd;

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
    return $data;


}

function Notif($IdAdherant)
{
    global $bdd;

    echo '';
    $req = "SELECT IdNotif, TypeNotif.Nom AS Type, Commentaire
FROM Notif, TypeNotif , Adherant 
WHERE IdAdherant = ?
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; ";

    $result = $bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data = $result->fetchAll();
    return $data;
}

function Admin()
{
    global $bdd;

    echo '';
    $req = "SELECT Nom, Prenom, Mail FROM Admin";

    $result = $bdd->prepare($req);
    $result->execute();

    $data = $result->fetchAll();
    return $data;

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
