
<br>
<div class="container" >
    <h2 class="page-header">Historique :</h2>
    <div class="text-center">
        <table class="table table-bordered">
            <tr>
                <th>IdEmprun</th>
                <th>IdExemplaire</th>
                <th>Oeuvres</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>
        <?php
        $Historiques = Historique($_SESSION['IdAdherant']);

        foreach ($Historiques as $Historique) {
            echo '<tr>
                    <td>' . $Historique['IdEmprun'] . '</td>
                    <td>' . $Historique['IdExemplaire'] . '</td>
                    <td>' . $Historique['Titre'] . '</td>
                    <td>' . $Historique['DatePret'] . '</td>
                    <td>' . $Historique['date_Retour'] . '</td>
              </tr>';
        }
        ?>
        </table>
    </div>
</div>
