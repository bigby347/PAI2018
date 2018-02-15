<?php
    include 'config_bdd.php';
/* TODO: catalogue
    function printCatalogue(){
        global $bdd;
        global $data;

        $req = '';
        $result=$bdd->prepare($req);
        $result->execute();

        $data->fetch();
        foreach ($data as $catalogue){
            echo '<tr>
                    <td>'.$catalogue[''].'</td>
                    <td>'.$catalogue[''].'</td>
                    <td>'.$catalogue[''].'</td>
                 </tr>';
        }
    }
*/