
<!-- **************************
    Partie ajout Exemplaire
**************************** -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <h2 class="page-header">Gestions des Exemplaires </h2>
    <h4>Ajout d'exemplaire</h4>
    <?php
    if (isset($_POST['addExemplaire'])) {
        addExemplaire($_POST['select_livre'],$_POST['nbExemp'],$_POST['dateAchat']);
    }
    ?>
    <div class="row">
        <div class="col-lg-12 well">
            <h3>Exemplaire(s) <span class="label label-primary">Ajout</span></h3>
            <br>
            <div class="row">
                <form class="form-inline" id="form-exemp" method="post">
                    <div class="col-sm-12">
                        <div class="col-sm-4 form-group">
                            <label>Œeuvre</label>
                            <select class="selectpicker" name="select_livre" title="Selectionner œuvre"
                                    data-style="btn-default" data-live-search="true">
                                <?php $listBook=listBook();
                                foreach ($listBook as $list) {
                                    echo '<option data-subtext="' . $list['IdLivre'] . '" value="' . $list['IdLivre'] . '">' . $list['Titre'] . '</option>';
                                }?>
                            </select>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Nombre</label>
                            <input type="number" name="nbExemp" placeholder="Nombre d'exemplaire" class="form-control"
                                   required="" min="1">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Date d'achat</label>
                            <input type="date" name="dateAchat" placeholder="Date d'achat" class="form-control"
                                   required="">
                        </div>
                        <div class="col-sm-4 form-group">
                            <br>
                            <button type="submit" name="addExemplaire" class="btn btn-lg btn-success"><span
                                        class="glyphicon glyphicon-ok"></span> Ajouter
                            </button>
                            <button type="reset" class="btn btn-lg btn-danger"><span
                                        class="glyphicon glyphicon-remove"></span> Réinitialiser
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>