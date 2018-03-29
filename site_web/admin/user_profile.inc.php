<div class="row">
    <h2 class="page-header text-primary text-center">Profil utilisateur</h2>
    <?php
    $dataUser = printProfile($_POST['profile']);
    ?>
    <div class="container-fluid col-lg-6 col-lg-offset-3 text-center">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><?= $dataUser['Nom'];?>  <?= $dataUser['Prenom'];?></h3>
            </div>
            <div class="panel-body">
                <h5>ID Utilisateurs: <?= $dataUser['IdAdherant']; ?></h5>
                <h5>Email: <?= $dataUser['Mail']; ?></h5>
                <h5>Adresse : <?= $dataUser['Adresse'];?></h5>
                <h5>Adhesion : <?= $dataUser['adhesion']; ?></h5>
                <h5>Cotisation : <?= $dataUser['cotisation']; ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid col-lg-12">


        <h4 class="page-header text-info">Historique Emprunt</h4>'
        <table class="table table-bordered">
            <tr>
                <th>IdEmprun</th>
                <th>IdExemplaire</th>
                <th>Oeuvres</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>
            <?php
            $Historiques = Historique($_POST['profile']);

            foreach ($Historiques as $Historique) {
                echo '<tr>
                    <td>' . $Historique['IdEmprun'] . '</td>
                    <td>' . $Historique['IdExemplaire'] . '</td>
                    <td>' . $Historique['Titre'] . '</td>
                    <td>' . $Historique['DatePret'] . '</td>
                    <td>' . $Historique['date_Retour'] . '</td>
              </tr>';
            }
            ?>
        </table>


        <h4 class="page-header text-info">Réservation</h4>
        <table class="table table-bordered">
            <tr>
                <th>IdReservation</th>
                <th>Oeuvre</th>
                <th>IdExemplaire</th>
                <th>Date Reservation</th>
                <th>Annuler</th>
            </tr>
            <?php
            if (isset($_POST['SupprimeReservation'])){
                SupprimeReservation($_POST['SupprimeReservation']);
            }
            $Reservations = Reservation($_POST['profile']);
            foreach ($Reservations as $Reservation) {
                echo '<tr>
                    <td>' . $Reservation['IdReservation'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['IdExemplaire'] . '</td>
                    
                    <td>
                        <form action = "" method="post">
                        <input type="hidden" name="profile" value= '.$_POST['profile'].' >
                        <button type="submit" class="btn btn-primary" name="SupprimeReservation" value=' . $Reservation['IdReservation'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
            }
            ?>
        </table>


        <h4 class="page-header text-info">Requête</h4>
        <table class="table table-bordered">
            <tr>
                <th>IdRequete</th>
                <th>Oeuvres</th>
                <th>Date de demande</th>
                <th>Annuler</th>
            </tr>
            <?php
            if (isset($_POST['SupprimeRequete'])){
                SupprimeRequete($_POST['SupprimeRequete']);
            }
            $data = Requete($_POST['profile']);
            foreach ($data as $Requete) {
                echo '<tr>
                    <td>' . $Requete['IdRequete'] . '</td>
                    <td>' . $Requete['Titre'] . '</td>
                    <td>' . $Requete['Requete'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <input type="hidden" name="profile" value= '.$_POST['profile'].' >
                        <button type="submit" class="btn btn-primary" name="SupprimeRequete" value=' . $Requete['IdRequete'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
            }
            ?>
        </table>

        <h4 class="page-header text-info">Emprunt en Cours</h4>
        <table class="table table-bordered">
            <tr>
                <th>IdEmprun</th>
                <th>IdExemplaire</th>
                <th>Oeuvres</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Renouveller</th>
            </tr>
            <?php
            if (isset($_POST['RenouvEmprun'])){
                RenouvEmprun($_POST['RenouvEmprun'],$_POST['profile']);
                echo '<script> alert("Renouvelement demandé") </script>';
            }
            ?>

            <?php
            $Empruns = Emprun($_POST['profile']);
            foreach ($Empruns as $Emprun) {

                $form = '<form action = "" method="post">
                    <input type="hidden" name="profile" value= '.$_POST['profile'].' >
                    <button type="submit" class="btn btn-primary" name="RenouvEmprun" value=' . $Emprun['IdEmprun'] . ' >Renouveller</button>
                </form>';
                if ($Emprun['Renouvelement'] == 2) {
                    $form = ' ';
                }
                echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>' . $Emprun['date_Retour'] . '</td>
                    <td>
                        ' . $form . '
                    </td>
              </tr>';
            }
            ?>
        </table>
    </div>
</div>
