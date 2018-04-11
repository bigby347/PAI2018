<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Portail</h2>
    <div class="row">
        <div class="col-sm-8 well">
            <h4 >Relance des adhérants retardataire</h4>
            <!-- Faire un petit diag avec pret/pretretard -->
            <?php
            $NbRelance = 0;
            if (isset($_POST['Relance'])){ //gestion des relances
                $empruns = Empruns();
                foreach ($empruns as $emprun){
                    if ($emprun['date_Retour'] > date('Y-m-d')){
                        addNotif($emprun['IdAdherent'],8 ,'Vous devez ramener l\'exemplaire d\'identifiant '.$emprun['IdExemplaire'].' du livre '.$emprun['Titre']);
                        $NbRelance ++;
                    }
                }

                UpdateRelance();

                echo '<script> alert("Il y a eu '.$NbRelance.' relances d\'adhérant négligeant") </script>';
            }

            if (Relance() <  date('Y-m-d')){
                echo  '<form action = "" method="post">
                        <button type="submit" class="btn btn-success" name="Relance" value= "T" >Lancer la relance</button>
                        </form>';
            }

            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">La relance</div>
                <div class="panel-body">
                    La relances des adhérants négligeants doit avoir lieu toutes les semaines. La prochaine relance sera a partir du <?= Relance(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 well">
            <h4>Gestion des reservations non récupérées</h4>
            <?php
            $NbOld = 0;
            if (isset($_POST['Maintenance'])){
                $reservations = Reservations();
                foreach ($reservations as $reservation){
                    if ($reservation['dateFin'] < date('Y-m-d')){
                        //echo $reservation['DateAcceptation'].' - '.$reservation['dateFin'];
                        //echo 'Ad :'.$reservation['IdAdherent'];
                        SupprimeReservation($reservation['IdReservation']);
                        addNotif($reservation['IdAdherent'],8 ,'Votre reservations est arrivé a expriration');
                        $NbOld ++;
                    }
                }

                //DeleteOldReservation();
                UpdateMaintenance();
                echo '<script> alert("Il y a eu '.$NbOld.' Reservation suprimé") </script>';
            }

            if (Maintenance() != date('Y-m-d')){
                echo  '<form action = "" method="post">
                        <button type="submit" class="btn btn-success" name="Maintenance" value= "T" >Lancer la supression</button>
                        </form>';
            }

            ?>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Les reservations</div>
                <div class="panel-body">
                    La supression des reservations non récupérer doit avoir lieu tout les jours. La dernière maintence a eu lieu le <?= Maintenance(); ?>
                </div>
            </div>
        </div>
    </div>






</div>