<?php
if(isset($_POST['addExemplaire'])){
    $exemplaire = $_POST['select_exemplaire'];
    $user=$_POST['select_user'];
    addEmprun($exemplaire,$user);
}
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Enregistement de prêt</h2>
    <div class="col-lg-8">
        <div class="row well">
            <form class="form-inline" method="post">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Œeuvre</label>
                            <select class="selectpicker" name="select_exemplaire[]" title="Selectionner œuvre"
                                    data-style="btn-default" multiple data-live-search="true">
                                <?php $listExemplaire = listExemplaire();
                                foreach ($listExemplaire as $list) {
                                    echo '<option data-subtext=" ID_EX :' . $list['IdExemplaire'] . '" value="' . $list['IdExemplaire'] . '">' . $list['Titre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Œeuvre</label>
                            <select class="selectpicker" name="select_user" title="Selectionner Utilisateur"
                                    data-style="btn-default" data-live-search="true">
                                <?php $listUser = listUser();
                                foreach ($listUser as $list) {
                                    echo '<option data-subtext="' . $list['IdAdherant'] . '" value="' . $list['IdAdherant'] . '">' . $list['Nom'] . ' ' . $list['Prenom'] . '</option>';
                                }
                                ?>
                            </select>
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
                </div>
            </form>
        </div>
    </div>
</div>