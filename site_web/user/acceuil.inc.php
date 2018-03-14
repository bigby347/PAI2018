
<?php include '../fonctions/user.php'; ?>
<div class="portal-page-column column-1 col-md-12     col-md-100 container">
  <h3>Bonjour <?= $_SESSION['Nom'];?> : <?= $_SESSION['IdAdherant'];?></h3><br>
  <div class="row">
    <div class="col-sm-4" name="table">
        <span>Vos Requetes en Cours :</span>

            <?php printRequete($_SESSION['IdAdherant']); ?>

        <span>Vos Reservations en Cours :</span>

            <?php printReservation($_SESSION['IdAdherant']); ?>

        <span>Vos Emprum en Cours :</span>

            <?php printEmprun($_SESSION['IdAdherant']); ?>

    </div>

  </div>
</div>