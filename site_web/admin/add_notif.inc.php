<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header"> </h2>
    <div class="row">
        <div class="text-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <?php
                if (isset($_POST['addNotif'])){
                    addNotif($_POST['selectAd'],1,$_POST['Message']);
                }
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">Envoie de notification</div>
                    <div class="panel-body">
                        <form action = "" method="post">
                            <select class="selectpicker" name="selectAd" title="Selectionner Adherant"
                                    data-style="btn-default" data-live-search="true">
                                <?php
                                $listUser=listUser();
                                foreach ($listUser as $user) {
                                    echo '<option data-subtext="' . $user['IdAdherant'] . '" value="' . $user['IdAdherant'] . '">'.$user['Nom'].' '.$user['Prenom'].'</option>';
                                }

                                ?>
                            </select>
                            <br>
                            <label>Message:</label>
                            <textarea class="form-control" rows="3" name="Message"></textarea>
                            <br>
                            <button type="submit" class="btn btn-primary" name="addNotif" value="1">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

</div>