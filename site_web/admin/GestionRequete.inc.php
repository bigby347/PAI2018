<?php include '../fonctions/admin.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestions des requètes </h2>
    <?php

    /* Gestion de l'acceptation de la requete*/
    if (isset($_POST['ValidationRequete'])){

        ValidationRequete($_POST['IdRequete'],$_POST['IdAdherant'], $_POST['IdExemplaire'], $premiereRequete['Titre']);
    }
    ?>

    <h4 class="page-header text-info">Détail de la requète</h4>
    <?php
    $premiereRequete = premiereRequete();
    ?>
    <table class="table table-bordered">
        <tr>
            <th>Nom : </th>
            <td><?= $premiereRequete['Nom']; ?></td>
        </tr>
        <tr>
            <th>Prenom : </th>
            <td><?= $premiereRequete['Prenom']; ?></td>
        </tr>
        <tr>
            <th>Id Adhérent : </th>
            <td><?= $premiereRequete['IdAdherant']; ?></td>
        </tr>
        <tr>
            <th>Id Requete : </th>
            <td><?= $premiereRequete['IdRequete']; ?></td>
        </tr>
        <tr>
            <th>Titre : </th>
            <td><?= $premiereRequete['Titre']; ?></td>
        </tr>
        <tr>
            <th>Cote : </th>
            <td><?= $premiereRequete['Cote']; ?></td>
        </tr>
        <tr>
            <th>Id Livre : </th>
            <td><?= $premiereRequete['IdLivre']; ?></td>
        </tr>
    </table>
    <h4 class="page-header text-info">Livres disponibles : </h4>
    <?php
    $ExemplaireDispo = ExemplaireDispo($premiereRequete['IdLivre']);

    echo '<table class="table table-bordered">
            <tr>
                <th>Id Exemplaire</th>
                <th>Date achat</th>
                <th></th>
            </tr>';
    foreach ($ExemplaireDispo as $Ex) {
    echo '<tr>
        <td>' . $Ex['IdExemplaire'] . '</td>
        <td>'.$Ex['Achat'].'</td>
        <td>
            <form action = "" method="post">
                <input type="hidden" name="IdRequete" value= '.$premiereRequete['IdRequete'].'>
                <input type="hidden" name="IdAdherant" value= '.$premiereRequete['IdAdherant'].'>
                <input type="hidden" name="IdLivre" value= '.$premiereRequete['IdLivre'].'>
                <input type="hidden" name="IdExemplaire" value= '.$Ex['IdExemplaire'].'>
                <button type="submit" class="btn btn-primary" name="ValidationRequete" value="T" >Choisir</button>
            </form>
        </td>
    </tr>';
    }
    ?>

</div>
