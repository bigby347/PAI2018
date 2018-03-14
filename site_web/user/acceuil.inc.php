
<?php include '../fonctions/user.php'; ?>
<div class="container" >
    <h3>Bonjour <?= $_SESSION['Nom'];?> </h3><br>
  <div class="row">
    <div class="col-sm-9" name="table">
        <span>Vos Requetes en Cours :</span>
        <?php
            if (isset($_POST['SupprimeRequete'])){
                SupprimeRequete($_POST['SupprimeRequete']);
            }
            printRequete($_SESSION['IdAdherant']);
        ?>

        <span>Vos Reservations en Cours :</span>

        <?php
            if (isset($_POST['SupprimeReservation'])){
                SupprimeReservation($_POST['SupprimeReservation']);
            }
            printReservation($_SESSION['IdAdherant']);
        ?>

        <span>Vos Emprum en Cours :</span>

        <?php
            if (isset($_POST['SupprimeEmprun'])){
                SupprimeEmprun($_POST['SupprimeEmprun']);
            }
            printEmprun($_SESSION['IdAdherant']);
        ?>

    </div>

  </div>
</div>


<br>
<br>
<br>
<br>
