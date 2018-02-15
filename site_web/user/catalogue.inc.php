<div class="container" >

    <h2>Catalogue</h2>
    <?php include '/fonctions/user.php'; ?>
    <div class="text-center">
        <table style="width: 100%;">
            <tr>
                <th>Oeuvres</th>
                <th>Auteur</th>
                <th>Publication</th>
                <th>Id Livre</th>
                <th>Côte</th>
                <th>Emprunter</th>
            </tr>
            <?php printCatalogue(); ?>
        </table>
    </div>


</div>