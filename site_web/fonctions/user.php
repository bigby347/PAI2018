<?php
    include 'config_bdd.php';
// TODO: catalogue

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
                    <td>test</td>
                 </tr>';
       }
    }
// TODO: makeRequest()

    function makeRequest(){

    }