<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestions des Emprunts </h2>
    <?php
    if (isset($_POST['RetourEmprun'])){
        RetourEmprun($_POST['RetourEmprun']);
    }

    if (isset($_POST['Destruction'])){
        //echo $_POST['IdExemplaire'];
        //echo $_POST['selectAd'];
        RetourEmprun($_POST['Destruction']);
        //SupExemplaire($_POST['IdExemplaire']);
    }

    if (isset($_POST['selectAd'])) {
        echo '<table class="table table-bordered">
                <tr>
                    <th>IdEmprun</th>
                    <th>Oeuvre</th>
                    <th>IdExemplaire</th>
                    <th>Date Pret</th>
                    <th>Date maximum de retour</th>
                    <th> </th>
                    <th> </th>
                </tr>';
        $Empruns = Emprun($_POST['selectAd']);
        foreach ($Empruns as $Emprun) {
            echo '<tr>
                    <td>' . $Emprun['IdEmprun'] . '</td>
                    <td>' . $Emprun['Titre'] . '</td>
                    <td>' . $Emprun['IdExemplaire'] . '</td>
                    <td>' . $Emprun['DatePret'] . '</td>
                    <td>'.$Emprun['date_Retour'].'</td>
                    <td>
                        <form action = "" method="post">
                        <input type="hidden" name="selectAd" value= ' . $_POST['selectAd'] . '>
                        <button type="submit" class="btn btn-success" name="RetourEmprun" value=' . $Emprun['IdEmprun'] . ' >Enregistrer le retour</button>
                        </form>
                    </td>
                    <td>
                        <form action = "" method="post">
                        <input type="hidden" name="selectAd" value= ' . $_POST['selectAd'] . '>
                        <input type="hidden" name="IdExemplaire" value= ' .$Emprun['IdExemplaire']. '>
                        <button type="submit" class="btn btn-danger" name="Destruction" value=' . $Emprun['IdEmprun'] . ' >Enregistrer la perte/destruction</button>
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
                    Choisir un adhérant pour voir ses Emprunts en cours !
                </div>
            </div>
        </div>

    </div>


</div>