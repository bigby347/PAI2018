<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestion des demandes de renouvelement</h2>
    <?php
    /* Gestion des acceptations*/
    if (isset($_POST['RenouvelementAccepter'])){
        RenouvelementAccepter($_POST['RenouvelementAccepter'],$_POST['IdAdherent']);

    }
    if (isset($_POST['RenouvelementRefuser'])){
        RenouvelementRefuser($_POST['RenouvelementRefuser'],$_POST['IdAdherent']);

    }

    ?>
    <?php
    $renouv = premiereRenouv();
    /*var_dump($renouv)*/
    ?>
    <h4 class="page-header text-info">Demande de <?= $renouv['Nom']; ?> <?= $renouv['Prenom']; ?></h4>
    <table class="table table-bordered">
        <tr>
            <th>Titre : </th>
            <td><?= $renouv['Titre']; ?></td>
        </tr>
        <tr>
            <th>Id Livre : </th>
            <td><?= $renouv['IdLivre']; ?></td>
        </tr>
        <tr>
            <th>Cote : </th>
            <td><?= $renouv['Cote']; ?></td>
        </tr>
        <tr>
            <th>Id Exemplaire : </th>
            <td><?= $renouv['IdExemplaire']; ?></td>
        </tr>
        <tr>
            <th>Date du pret : </th>
            <td><?= $renouv['DatePret']; ?></td>
        </tr>
        <tr>
            <th>Id de l'emprunt : </th>
            <td><?= $renouv['IdEmprun']; ?></td>
        </tr>
        <tr>
            <th>Date demande : </th>
            <td><?= $renouv['DateDemande']; ?></td>
        </tr>
    </table>
    <div class="row">
        <form action = "" method="post">
            <input type='hidden' name='IdAdherent' value=<?= $renouv['IdAdherent']; ?>>
            <div class="text-center">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block" name="RenouvelementAccepter" value=<?= $renouv['IdEmprun'];?> >Accepter</button>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-danger btn-block" name="RenouvelementRefuser" value=<?= $renouv['IdEmprun'];?> >Refuser</button>
                </div>
            </div>
        </form>

    </div>
    <div class="row">
        <h4 class="page-header text-info">Détail sur le livre</h4>
        <div class="col-sm-6">
            <div class="text-center">
                <div class="panel panel-default">
                    <div class="panel-body">Détail du livre : <?= $renouv['Titre']; ?></div>
                    <div class="panel-footer">
                        <?php $detail = NbreExemplaire($renouv['IdLivre'])?>
                        <p>Nbre d'exemplaire : <?= $detail['total']; ?> </p>
                        <p>Nbre d'exemplaire diponible : <?= $detail['dispo']; ?></p>
                        <p>Nbre de demande en cour : <?= $detail['demande']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <script type="text/javascript">
                window.onload = function () {
                    var chart = new CanvasJS.Chart("chartContainer",
                        {
                            title:{
                                text: "Graphique de l'état des différent exemplaire"
                            },
                            legend: {
                                maxWidth: 350,
                                itemWidth: 120
                            },
                            data: [
                                {
                                    type: "pie",
                                    showInLegend: true,
                                    legendText: "{indexLabel}",
                                    dataPoints: [
                                        { y: <?= $detail['dispo']; ?>, indexLabel: "Disponible" },
                                        { y: <?= $detail['total']-$detail['dispo']; ?>, indexLabel: "Emprunter ou réservé" }
                                    ]
                                }
                            ]
                        });
                    chart.render();
                }
            </script>
            <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
</div>
</div>