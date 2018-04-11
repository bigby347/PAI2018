

<div class="container">

    <h3>Bonjour <?= $_SESSION['Nom'];?> </h3><br>
    <div class="row">
        <div class="col-sm-8" >
            <?php
            if (isset($_POST['SupprimeRequete'])){
                SupprimeRequete($_POST['SupprimeRequete']);
            }
            ?>

            <table class="table table-bordered">
            <tr>
                <th>IdRequete</th>
                <th>Oeuvres</th>
                <th>Date de demande</th>
                <th>Annuler</th>
            </tr>

            <?php
            $Requetes = Requete($_SESSION['IdAdherent']);

            foreach ($Requetes as $Requete) {
                echo '<tr>
                    <td>' . $Requete['IdRequete'] . '</td>
                    <td>' . $Requete['Titre'] . '</td>
                    <td>' . $Requete['Requete'] . '</td>
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeRequete" value=' . $Requete['IdRequete'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
            }

            ?>
            </table>
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
            ?>
            <table class="table table-bordered">
                <tr>
                    <th>IdReservation</th>
                    <th>Oeuvre</th>
                    <th>IdExemplaire</th>
                    <th>Date Reservation</th>
                    <th>Annuler</th>
                </tr>
            <?php
            $Reservations = Reservation($_SESSION['IdAdherent']);
            foreach ($Reservations as $Reservation) {
                echo '<tr>
                    <td>' . $Reservation['IdReservation'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['IdExemplaire'] . '</td>
                    <td>' . $Reservation['DateAcceptation'] . '</td>
                    
                    <td>
                        <form action = "" method="post">
                        <button type="submit" class="btn btn-primary" name="SupprimeReservation" value=' . $Reservation['IdReservation'] . ' >Suprimmer</button>
                        </form>
                    </td>
              </tr>';
            }
            ?>
            </table>
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
                RenouvEmprun($_POST['RenouvEmprun'],$_SESSION['IdAdherent']);
                echo '<script>alert("Votre demande de renouvelement à bien été enregistrée") </script>';
            }
            ?>
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
            $Empruns = Emprun($_SESSION['IdAdherent']);
            foreach ($Empruns as $Emprun) {

                $form = '<form action = "" method="post">
                    <button type="submit" class="btn btn-primary" name="RenouvEmprun" value=' . $Emprun['IdEmprun'] . ' >Renouveller</button>
                </form>';
                if ($Emprun['Renouvelement'] == 2){
                    $form = ' ';
                }
                echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>' . $Emprun['date_Retour'] . '</td>
                    <td>
                        '.$form.'
                    </td>
              </tr>';
            }
            ?>
            </table>
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
