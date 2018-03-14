<div class="container" >
    <?php require '../fonctions/user.php'; ?>

    <?php
    if (isset($_POST['AjoutRequete'])){
        AjoutRequete($_POST['AjoutRequete']);
    }
    ?>


    <h2 class="page-header">Catalogue</h2>

    <div class="text-center">
        <table class="table table-bordered">
            <tr>
                <th>Oeuvres</th>
                <th>Auteur</th>
                <th>Mots-clef</th>
                <th>Description</th>
                <th>Publication</th>
                <th>Id Livre</th>
                <th>Côte</th>
                <th>Emprunter</th>
            </tr>
            <?php printCatalogue(); ?>
        </table>
    </div>


</div>