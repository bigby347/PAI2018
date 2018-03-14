<?php
    include 'config_bdd.php';

function printCatalogue(){
        global $bdd;

        $req = "SELECT Oeuvre.IdLivre, 
                  Oeuvre.Titre, 
                  Oeuvre.Cote, 
                  Oeuvre.Publication, 
                  group_concat(Auteur.Nom, ' ',Auteur.Prenom , ' ') AS Auteurs,  
                  group_concat(MotClef.Nom, ' ') AS MotClefs,
                  Oeuvre.Description
                FROM Oeuvre
                    LEFT JOIN Ecrit ON Oeuvre.IdLivre = Ecrit.FkLivre
                    LEFT JOIN Auteur ON Ecrit.FkAuteur = Auteur.IdAuteur
                    LEFT JOIN Definition ON Oeuvre.IdLivre = Definition.FkLivre
                    LEFT JOIN MotClef ON Definition.FkMotClef = MotClef.IdMotClef
                GROUP BY Oeuvre.IdLivre";
        $result=$bdd->prepare($req);
        $result->execute();

        $data=$result->fetchAll();
       foreach ($data as $catalogue){
            echo '<tr>
                    <td>'.$catalogue['Titre'].'</td>
                    <td>'.$catalogue['Auteurs'].'</td>
                    <td>'.$catalogue['MotClefs'].'</td>
                    <td>'.$catalogue['Description'].'</td>
                    <td>'.$catalogue['Publication'].'</td>
                    <td>'.$catalogue['IdLivre'].'</td>
                    <td>'.$catalogue['Cote'].'</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="AjoutRequete" value='.$catalogue['IdLivre'].' >Demande de prét</button>
                        </form>
                    </td>
                 </tr>';
       }
    }

function printRequete($IdAdherant){
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdRequete</th>
                <th>Oeuvres</th>
                <th>Date de demande</th>
                <th>Annuler</th>
            </tr>';
    $req = "Select IdRequete, Titre, Requete, IdLivre
    From Requete, Oeuvre, Adherant 
    Where Oeuvre.IdLivre = Requete.FkLivre
    And Requete.FkAdherant = Adherant.IdAdherant
    And Adherant.IdAdherant = ?";

    $result=$bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data=$result->fetchAll();
    foreach ($data as $Requete){
        echo '<tr>
                    <td>'.$Requete['IdRequete'].'</td>
                    <td>'.$Requete['Titre'].'</td>
                    <td>'.$Requete['Requete'].'</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeRequete" value='.$Requete['IdRequete'].' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }

    echo '</table>';
}

function printReservation($IdAdherant){
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdReservation</th>
                <th>Oeuvres</th>
                <th>Date Reservation</th>
                <th>Annuler</th>
            </tr>';
    $req = "Select Titre,DateRequete, IdLivre, IdReservation
    From Reservation, Oeuvre, Adherant 
    Where Oeuvre.IdLivre = Reservation.FkLivre
    And Reservation.FkAdherant = Adherant.IdAdherant
    And Adherant.IdAdherant = ?
    And Reservation.DateAcceptation is null;";

    $result=$bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data=$result->fetchAll();
    foreach ($data as $Reservation){
        echo '<tr>
                    <td>'.$Reservation['IdReservation'].'</td>
                    <td>'.$Reservation['Titre'].'</td>
                    <td>'.$Reservation['DateRequete'].'</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeReservation" value='.$Reservation['IdReservation'].' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }

    echo '</table>';
}

function printEmprun($IdAdherant){
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
    $req = "Select IdEmprun, IdExemplaire, Titre, DatePret,DATE_ADD(DatePret, INTERVAL 1 MONTH) AS date_Retour
    From Emprun, Exemplaire, Oeuvre, Adherant 
    Where Oeuvre.IdLivre = Exemplaire.FkLivre
    And Exemplaire.IdExemplaire = Emprun.FkExemplaire
    And Emprun.FkAdherant = Adherant.IdAdherant
    And Adherant.IdAdherant = ?
    And Emprun.DateRetour IS NULL;";

    $result=$bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data=$result->fetchAll();
    foreach ($data as $Emprun){
        echo '<tr>
                    <td>'.$Emprun['IdEmprun'].'</td>
                    <td>'.$Emprun['IdExemplaire'].'</td>
                    <td>'.$Emprun['Titre'].'</td>
                    <td>'.$Emprun['DatePret'].'</td>
                    <td>'.$Emprun['date_Retour'].'</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="RenouvEmprun" value='.$Emprun['IdEmprun'].' >Renouveller</button>
                        </form>
                    </td>
              </tr>';
    }

    echo '</table>';
}

function printNotif($IdAdherant){
    global $bdd;

    echo '<table class="table table-bordered">
            <tr>
                <th>IdNotif</th>
                <th>Type</th>
                <th>Commentaire</th>
                <th>Suprimmer</th>
            </tr>';
    $req = "Select IdNotif, TypeNotif.Nom as Type, Commentaire
From Notif, TypeNotif , Adherant 
where IdAdherant = ?
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; ";

    $result=$bdd->prepare($req);
    $result->execute([$IdAdherant]);

    $data=$result->fetchAll();
    foreach ($data as $Notif){
        echo '<tr>
                    <td>'.$Notif['IdNotif'].'</td>
                    <td>'.$Notif['Type'].'</td>
                    <td>'.$Notif['Commentaire'].'</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeNotif" value='.$Notif['IdNotif'].' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
    }

    echo '</table>';
}





function AjoutRequete($IdLivre,$IdAdherant){
    global $bdd;
    $req1 = "INSERT INTO Requete(FkLivre,FkAdherant,Requete)
    Values(?,?,STR_TO_DATE(?, '%d-%m-%Y'));";

    $result=$bdd->prepare($req1);
    $result->execute([$IdLivre,$IdAdherant,date('d-m-Y')]);

    $req = 'INSERT INTO Notif(FkAdherant,FkTypeNotif,Commentaire)
    Values(?,?,?)';
    $result=$bdd->prepare($req);
    $result->execute([$IdAdherant,3,'Requete enregistrée pour le livre '.$IdLivre]);

}



function SupprimeRequete($IdRequete){
    global $bdd;
    $req = "DELETE FROM Requete 
      Where IdRequete = ?";

    $result=$bdd->prepare($req);
    $result->execute([$IdRequete]);

    echo '<br> La requète a bien été suprimmé';
}

function SupprimeReservation($IdReservation){
    global $bdd;
    $req = "DELETE FROM Reservation
      Where IdReservation = ?";

    $result=$bdd->prepare($req);
    $result->execute([$IdReservation]);
}

//TODO : Renouvelement 
function RenouvEmprun($IdNotif){

}


function SupprimeNotif($IdNotif){
    global $bdd;
    $req = "DELETE FROM Notif
      Where IdNotif = ?";

    $result=$bdd->prepare($req);
    $result->execute([$IdNotif]);
}
