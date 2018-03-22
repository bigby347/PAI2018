<?php
    include '../fonctions/admin.php';
    register();
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Inscriptions Utilisateurs</h2>
    <div class="container">
        <div class="col-lg-12 well">
            <div class="row">
                <form method="post">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Nom</label>
                                <input type="text" placeholder="Votre nom ici" name="nom" class="form-control required=""">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Prénom</label>
                                <input type="text" placeholder="Votre prénom ici" name="prenom" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea placeholder="Entrer votre Adresse ici" name="adresse" rows="3"  class="form-control" required=""></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Ville</label>
                                <input type="text" name="ville" placeholder="Ville" class="form-control" required="">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Code Postale</label>
                                <input type="text" name="codep" placeholder="Code Postale" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Adresse Mail</label>
                            <input type="text" name="mail" placeholder="Email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>N°Téléphone</label>
                            <input type="text" name="tel" placeholder="N°" class="form-control" required="">
                        </div>
                        <div id="dateCot" class="form-group">
                            <label>Payement Cotisation</label>
                            <input type="checkbox" id="check" value="Cotisation" onclick="toggle('check', 'dateCot')">
                            <input type="text" name="cotisation" placeholder="Date de cotisation (Format: jour-mois-année)" class="form-control" disabled>
                        </div>
                        <button type="submit" name="inscription" class="btn btn-lg btn-success">Inscrire</button>
                        <button type="reset" class="btn btn-lg btn-danger">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/js/script.js"></script>