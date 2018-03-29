
<br>
<div class="container" >
    <h2 class="page-header">Contact :</h2>
    <div class="row">
        <div class="col-sm-8" >
            <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                </tr>
            <?php
            $Admins = Admin();
            foreach ($Admins as $Admin) {
                echo '<tr>
                    <td>' . $Admin['Nom'] . '</td>
                    <td>' . $Admin['Prenom'] . '</td>
                    <td>' . $Admin['Mail'] . '</td>
              </tr>';
            }
            ?>

            </table>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Le contact</div>
                <div class="panel-body">
                    Vous etes aussi les bienvenus durant les horaires d'ouverture de la bibliothèque !
                    C'est a dire tout les jours de 9h a midi et de 14h a 18h sauf le lundi !
                </div>
            </div>
        </div>

    </div>
</div>

