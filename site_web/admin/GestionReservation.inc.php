<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestions des reservation </h2>
    <?php
    if (isset($_POST['ReservationAccepter'])){
        addEmprun($_POST['IdExemplaire'],$_POST['selectAd']);
        SupprimeReservation($_POST['ReservationAccepter']);
    }



    if (isset($_POST['selectAd'])) {
        echo '<table class="table table-bordered">
                <tr>
                    <th>IdReservation</th>
                    <th>Oeuvre</th>
                    <th>IdExemplaire</th>
                    <th>Date Reservation</th>
                    <th> </th>
                </tr>';
        $Reservations = Reservation($_POST['selectAd']);
        foreach ($Reservations as $Reservation) {
            echo '<tr>
                    <td>' . $Reservation['IdReservation'] . '</td>
                    <td>' . $Reservation['Titre'] . '</td>
                    <td>' . $Reservation['IdExemplaire'] . '</td>
                    <td>' . $Reservation['DateAcceptation'] . '</td>
                    
                    <td>
                        <form action = "" method="post">
                        <input type="hidden" name="selectAd" value= ' . $_POST['selectAd'] . '>
                        <input type="hidden" name="IdExemplaire" value= ' .$Reservation['IdExemplaire']. '>
                       
                        <button type="submit" class="btn btn-primary" name="ReservationAccepter" value=' . $Reservation['IdReservation'] . ' >Donner</button>
                        </form>
                    </td>
              </tr>';
        }

        echo '</table>';

    }
    ?>
    <div class="row">
        <div class="col-sm-4" >
            <div class="panel panel-primary">
                <div class="panel-heading">Choisir un adhérant :</div>
                <div class="panel-body">
                    <form action = "" method="post">
                        <select class="selectpicker" name="selectAd" title="Selectionner Adhérent"
                                data-style="btn-default" data-live-search="true">
                            <?php
                            $listUser=listUser();
                            foreach ($listUser as $user) {
                                echo '<option data-subtext="' . $user['IdAdherent'] . '" value="' . $user['IdAdherent'] . '">'.$user['Nom'].' '.$user['Prenom'].'</option>';
                            }

                            ?>
                        </select>
                        <br><br>
                        <button type="submit" class="btn btn-primary" name="res" value="1">
                            Voir
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8" >
            <div class="panel panel-primary">
                <div class="panel-heading">Le choix de adhérent :</div>
                <div class="panel-body">
                    Choisir un adhérent pour voir ses réservations !
                </div>
            </div>
        </div>

    </div>


</div>