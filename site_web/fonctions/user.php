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
                    <td>A faire</td>
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
                    <td>A faire</td>
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
    foreach ($data as $Emprum){
        echo '<tr>
                    <td>'.$Emprum['IdEmprun'].'</td>
                    <td>'.$Emprum['IdExemplaire'].'</td>
                    <td>'.$Emprum['Titre'].'</td>
                    <td>'.$Emprum['DatePret'].'</td>
                    <td>'.$Emprum['date_Retour'].'</td>
                    <td>A faire</td>
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
                    <td>A faire</td>
              </tr>';
    }

    echo '</table>';
}





function AjoutRequete($IdLivre){
    echo 'Livre : '.$IdLivre;
    $req = '';
}