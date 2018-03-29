<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h2 class="page-header">Catalogue :</h2>

    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>Oeuvres</th>
                <th>Auteur</th>
                <th>Mots-clef</th>
                <th>Description</th>
                <th>Publication</th>
                <th>Id Livre</th>
                <th>Côte</th>
            </tr>
            <?php
            $catalogues = Catalogue(' ',' ');

            foreach ($catalogues as $catalogue) {
                echo '<tr>
                    <td>' . $catalogue['Titre'] . '</td>
                    <td>' . $catalogue['Auteurs'] . '</td>
                    <td>' . $catalogue['MotClefs'] . '</td>
                    <td>' . $catalogue['Description'] . '</td>
                    <td>' . $catalogue['Publication'] . '</td>
                    <td>' . $catalogue['IdLivre'] . '</td>
                    <td>' . $catalogue['Cote'] . '</td>
                 </tr>';

            }?>
        </table>

    </div>
</div>
