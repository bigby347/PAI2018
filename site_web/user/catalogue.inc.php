<div class="container" >

    <?php

    $recherche = '';
    $rechercheMC = '';


    if (isset($_POST['Recherche'])){

            $recherche = "WHERE ".$_POST['Champ']." LIKE '%".$_POST['MotRecherche']."%' ";
    }
    if (isset($_POST['RechAvAuteur'])){
        $recherche = "WHERE Auteur.IdAuteur =".$_POST['RechAvAuteur'];
    }

    if (isset($_POST['RechMCOu'])){
        $i = 1;
        $rechercheMC = 'WHERE ' ;
        foreach ($_POST['MC'] as $MC){
            if ($i != 1){
                $rechercheMC = $rechercheMC.' OR ';
            }
            $i ++;
            $rechercheMC = $rechercheMC.'IdMotClef = '.$MC;
        }
    }


    /*echo $recherche;
    echo $rechercheMC;*/

    ?>
    <?php
    if (isset($_POST['AjoutRequete'])){
        AjoutRequete($_POST['AjoutRequete'],$_SESSION['IdAdherant']);
        echo '<script>alert("Votre requéte à bien été enregistrée") </script>';
    }

    ?>


    <div class="row">
        <div class="text-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form action = "" method="post">
                            <input type="text" name = "MotRecherche">
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name = 'Champ'>
                                <option selected value="Titre">Titre</option>
                                <option value="IdLivre">IdLivre</option>
                                <option value="Cote">Cote</option>
                            </select>
                            <button type="submit" class="btn btn-primary" name="Recherche" >Recherche</button>
                        </form>
                        <a class="btn btn-primary btn-sm" href="?page=auteur" role="button">Recherche par auteur</a>

                        <a class="btn btn-primary btn-sm" href="?page=motClef" role="button" >Recherche par Mot Clef</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <h2 class="page-header">Catalogue :</h2>

    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>Oeuvres</th>
                <th>Auteur</th>
                <th>Mots-clef</th>
                <th>Description</th>
                <th>Publication</th>
                <th>Id Livre</th>
                <th>Côte</th>
                <th>Emprunter</th>
            </tr>
            <?php
            $catalogues = Catalogue($recherche,$rechercheMC);

            foreach ($catalogues as $catalogue) {
                echo '<tr>
                    <td>' . $catalogue['Titre'] . '</td>
                    <td>' . $catalogue['Auteurs'] . '</td>
                    <td>' . $catalogue['MotClefs'] . '</td>
                    <td>' . $catalogue['Description'] . '</td>
                    <td>' . $catalogue['Publication'] . '</td>
                    <td>' . $catalogue['IdLivre'] . '</td>
                    <td>' . $catalogue['Cote'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="AjoutRequete" value=' . $catalogue['IdLivre'] . ' >Demande de prét</button>
                        </form>
                    </td>
                 </tr>';

            }?>
        </table>

    </div>


</div>