<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2 class="page-header">Catalogue</h2>
        <?php include '../fonctions/user.php'; ?>
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
                    <th>Créer un emprun</th>
                </tr>
                <?php printCatalogue(); ?>
            </table>
        </div>
