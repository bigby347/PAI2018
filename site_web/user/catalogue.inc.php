<div class="container" >

    <h2 class="page-header">Catalogue</h2>
    <?php include '/fonctions/user.php'; ?>
    <div class="text-center">
        <table class="table table-bordered">
            <tr>
                <th>Oeuvres</th>
                <th>Auteur</th>
                <th>Publication</th>
                <th>Id Livre</th>
                <th>Côte</th>
                <th>Mots-clef</th>
                <th>Emprunter</th>
            </tr>
            <?php printCatalogue(); ?>
        </table>
    </div>


</div>