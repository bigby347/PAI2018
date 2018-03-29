<?php
include '../fonctions/admin.php';
addBook();
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestion des Livres</h2>
    <div class="container">
        <div class="col-lg-12 well">
            <h3>Livre(s) <span class="label label-primary">Nouveau</span></h3>
            <br>
            <div class="row">
                <form id="form-book" method="post">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Titre</label>
                                <input type="text" placeholder="Titre livre" name="titre" class="form-control"
                                       required="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Date de Publication</label>
                                <input type="text" placeholder="Année Publication Livre" name="datePub"
                                       class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea placeholder="Entrer une description ici" name="description" rows="3"
                                      class="form-control" required=""></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Auteur(s)</label>
                                <select class="selectpicker" name="select_auteur[]" title="Selectionner Auteur(s)"
                                        data-style="btn-default" multiple data-live-search="true">
                                    <?php $listAutor=listAutor();
                                    foreach ($listAutor as $list) {
                                        echo '<option data-subtext="' . $list['Prenom'] . '" value="' . $list['IdAuteur'] . '">' . $list['Nom'] . '</option>';
                                    }?>
                                </select>

                            </div>
                            <div class="col-sm-4 form-group" id="nouveau">
                                <label>Nouvel Auteur ?</label>
                                <input type="button" class="btn btn-warning" value="Ajouter" onclick="openModal()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Côte</label>
                            <input type="text" name="cote" placeholder="Côte" class="form-control" required="">
                        </div>
                        <button type="submit" name="addBook" class="btn btn-lg btn-success"><span
                                    class="glyphicon glyphicon-ok"></span> Inscrire
                        </button>
                        <button type="reset" class="btn btn-lg btn-danger"><span
                                    class="glyphicon glyphicon-remove"></span> Réinitialiser
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- **************************
            Partie ajout Exemplaire
        **************************** -->
        <?php addExemplaire(); ?>

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
                                   required="">
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


    <!-- Modal -->
    <div id="myModal" class="modal">
        <?php addAutor(); ?>
        <!-- Modal content -->
        <div class="modal-content">
            <span onclick="closeModal()" class="close">&times;</span>
            <form id="form-modal" method="post">
                <h4>Auteur <span class="label label-primary">Ajout</span></h4>
                <div class="row">
                    <input type="hidden" id="nbAuteur" value="1">
                    <div class="col-sm-4 form-group">
                        <label>Nom auteur</label>
                        <input type="text" name="nomAuteur1" placeholder="Nom Auteur 1" class="form-control"
                               required="">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>Prenom auteur</label>
                        <input type="text" name="prenomAuteur1" placeholder="Prénom Auteur 1" class="form-control">
                    </div>
                    <!--<div class="col-sm-4">
                        <br>
                        <button type="button" name="add" onclick="addRow()" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></button>
                        <button type="button" name="remove" onclick="removeRow()" class="btn btn-danger"><span class="glyphicon glyphicon-minus-sign" </button>
                    </div>-->
                </div>
                <div id="auteurDiv"></div>
                <button type="submit" name="addAutor" class="btn btn-success"><span
                            class="glyphicon glyphicon-ok"></span> Ajouter
                </button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>
                    Réinitialiser
                </button>
            </form>
        </div>
    </div>
</div>
</div>