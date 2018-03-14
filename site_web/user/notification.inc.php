<?php
include '../fonctions/user.php';

?>
<div class="portal-page-column column-1 col-md-12     col-md-100 container">
    <h3>Mes Notification : </h3><br>
    <div class="row">
        <div class="col-sm-9" name="table">
            <?php
            if (isset($_POST['SupprimeNotif'])){
                SupprimeNotif($_POST['SupprimeNotif']);
            }
            printNotif($_SESSION['IdAdherant']); ?>

        </div>
    </div>
</div>
