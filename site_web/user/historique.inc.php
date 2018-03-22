<?php require '../fonctions/user.php'; ?>
<br>
<div class="container" >
    <h2 class="page-header">Historique :</h2>
    <div class="text-center">
        <?php
        printHistorique($_SESSION['IdAdherant']);?>
    </div>
</div>
