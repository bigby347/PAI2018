<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2 class="page-header">Catalogue</h2>
        <?php include '/fonctions/user.php'; ?>
        <div class="text-center">
            <table style="width: 100%;">
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
