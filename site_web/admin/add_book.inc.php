<?php
    include '../fonctions/admin.php';
    addBook();
?>



<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Ajout de Livre</h2>
    <div class="container">
        <div class="col-lg-12 well">
            <div class="row">
                <form method="post">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Titre</label>
                                <input type="text" placeholder="Titre livre" name="titre" class="form-control" required="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Date de Publication</label>
                                <input type="text" placeholder="Année Publication Livre" name="datePub" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea placeholder="Entrer une description ici" name="adresse" rows="3"  class="form-control" required=""></textarea>
                        </div>
                        <div class="row">
                            <input type="hidden" id="nbAuteur" value="1">
                            <div class="col-sm-4 form-group">
                                <label>Nom auteur</label>
                                <input type="text" name="nomAuteur1" placeholder="Nom Auteur 1" class="form-control" required="">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Prenom auteur</label>
                                <input type="text" name="prenomAuteur1" placeholder="Prénom Auteur 1" class="form-control" required="">
                            </div>
                            <div class="col-sm-4 form-group">
                                <br>
                                <button type="button" name="add" onclick="addRow()" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-plus-sign" </button>
                                <button type="button" name="remove" onclick="removeRow()" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-minus-sign" </button>
                            </div>
                        </div>
                        <div id="auteurDiv">
                        </div>

                        <div class="form-group">
                            <label>Côte</label>
                            <input type="text" name="cote" placeholder="Côte" class="form-control" required="">
                        </div>
                        <button type="submit" name="addBook" class="btn btn-lg btn-success">Inscrire</button>
                        <button type="reset" class="btn btn-lg btn-danger">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
/*
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <?php
    /*if(isset($_POST['addBook'])){
        var_dump($_POST);
    }*/
    ?>
</div>

<script src="/js/script.js"></script>