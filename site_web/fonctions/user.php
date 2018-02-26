<?php
    include 'config_bdd.php';
// TODO: catalogue

function printCatalogue(){
        global $bdd;
        global $data;

        $req = 'Select Oeuvre.IdLivre, Oeuvre.Titre, Oeuvre.Cote, Year(Oeuvre.Publication) as Publication,
                        group_concat(Auteur.Nom, Auteur.Prenom , \',\') as Auteurs,
                        group_concat(MotClef.Nom, \',\') as Mots
                From Oeuvre, Ecrit, Auteur , Definition, MotClef
                Where Oeuvre.IdLivre = Ecrit.FkLivre
                And Ecrit.FkAuteur = Auteur.IdAuteur 
                And Definition.FkLivre = Oeuvre.IdLivre
                And Definition.FkMotClef = MotClef.IdMotClef ';
        $result=$bdd->prepare($req);
        $result->execute();

        $data->fetch();
       /* foreach ($data as $catalogue){
            echo '<tr>
                    <td>'.$catalogue['Nom'].'</td>
                    <td>'.$catalogue['Auteurs'].'</td>
                    <td>'.$catalogue['Publication'].'</td>
                    <td>'.$catalogue['IdLivre'].'</td>
                    <td>'.$catalogue['Cote'].'</td>
                    <td>'.$catalogue['Mots'].'</td>
                    <td>test</td>
                 </tr>';
        } */

       var_dump($data);
    }
// TODO: makeRequest()

    function makeRequest(){

    }