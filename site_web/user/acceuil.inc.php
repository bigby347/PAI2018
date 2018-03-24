
<?php include '../fonctions/user.php'; ?>

<div class="container">

    <h3>Bonjour <?= $_SESSION['Nom'];?> </h3><br>
    <div class="row">
        <div class="col-sm-8" >
            <?php
            if (isset($_POST['SupprimeRequete'])){
                SupprimeRequete($_POST['SupprimeRequete']);
            }
            printRequete($_SESSION['IdAdherant']);
            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Les Requètes</div>
                <div class="panel-body"> Lorsque vous demander un livre sur le catalogue, vous créer une requète.</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8" >
            <?php
            if (isset($_POST['SupprimeReservation'])){
            SupprimeReservation($_POST['SupprimeReservation']);
            }
            printReservation($_SESSION['IdAdherant']);
            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Les Réservations</div>
                <div class="panel-body">Le Livre de votre requète est disponible, cela devient donc une reservation, vous avez une semaine pour le recupérer</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8" >
            <?php
            if (isset($_POST['RenouvEmprun'])){
                RenouvEmprun($_POST['RenouvEmprun'],$_SESSION['IdAdherant']);
            }
            printEmprun($_SESSION['IdAdherant']);
            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Les Empruns</div>
                <div class="panel-body">Il s'agit des Livres que vous avez emprumter. Vous pouvez en profiter pendant un mois, ou deux si renouvellements</div>
            </div>
        </div>

    </div>
</div>


<br>
<br>
<br>
