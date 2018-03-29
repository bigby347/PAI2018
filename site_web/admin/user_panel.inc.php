<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <?php if (isset($_POST['profile'])) {
        include 'user_profile.inc.php';
    }  ?>

    <h2 class="page-header">Utilisateurs </h2>
    <div class="col-lg-7">
        <div class="row well">
            <h4>Recherche Utilisateur</h4>
            <form class="form-inline" method="post">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" placeholder="Votre nom ici" name="nom" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" placeholder="Votre prénom ici" name="prenom" class="form-control" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="rechercher" class="btn btn-default btn-primary center-block">Rechercher</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="liste" class="btn btn-default btn-primary center-block">Afficher Liste Complète</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <h2></h2>
        <?php include 'user_list.inc.php'; ?>
    </div>
</div>