<?php include '../fonctions/admin.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Demandes / Réservation</h2>
    <h4 class="page-header text-info">Demande Emprunt</h4>
    <table class="table table-bordered">
        <tr>
            <th>ID Adhérant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Titre</th>
            <th>Date Demande</th>
            <th>Validation</th>
        </tr>
        <?php printDemandeReservation(); ?>
    </table>
    <h4 class="page-header text-info">Demande Renouvellement</h4>
    <table class="table table-bordered">
        <tr>
            <th>ID Adhérant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Titre</th>
            <th>Date Demande</th>
            <th>Validation</th>
        </tr>
        <?php printDemandeRenouvelement(); ?>
    </table>


</div>
