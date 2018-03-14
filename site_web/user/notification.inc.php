<?php
include '../fonctions/user.php';

?>
<span>Vos Requetes en Cours :</span>

<?php printNotif($_SESSION['IdAdherant']); ?>