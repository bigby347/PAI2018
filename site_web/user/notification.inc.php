
<div class="container">
    <h3>Mes Notification : </h3><br>
    <div class="row">
        <div class="col-sm-8" name="table">
            <?php
            if (isset($_POST['SupprimeNotif'])){
                SupprimeNotif($_POST['SupprimeNotif']);
            }
            ?>
            <table class="table">
                <tr>
                    <th>IdNotif</th>
                    <th>Type</th>
                    <th>Commentaire</th>
                    <th>Suprimmer</th>
                </tr>
            <?php
                $Notifs = Notif($_SESSION['IdAdherant']);
            foreach ($Notifs as $Notif) {
                echo '<tr>
                    <td>' . $Notif['IdNotif'] . '</td>
                    <td>' . $Notif['Type'] . '</td>
                    <td>' . $Notif['Commentaire'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeNotif" value=' . $Notif['IdNotif'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
            }
            ?>
            </table>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Les notifications</div>
                <div class="panel-body">
                    Les notifications permettent au administrateur de communiquer avec vous, pensez à les regarder régulièrement !
                    <br>
                    Elles vous previendront aussi si votre requète est accepter, vous n'aurait alors qu'une semaine pour le recupérer attention !
                </div>
            </div>
        </div>
    </div>
</div>
