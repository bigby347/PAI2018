<div class="container" >
    <?php require '../fonctions/user.php'; ?>

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
    }
    ?>


    <div class="text-center">
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

    <h2 class="page-header">Catalogue :</h2>

    <div class="text-center">

            <?php printCatalogue($recherche,$rechercheMC); ?>

    </div>


</div>