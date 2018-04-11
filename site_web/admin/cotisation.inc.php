<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Gestions des cotisations </h2>


    <div class="text-center">
        <?php
        if (isset($_POST['Cotisation'])){
            cotisation($_POST['userCot']);
        }
        ?>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Date Adhésion</th>
                <th>Date Cotisation</th>
            </tr>
            <?php $listUser=listUser();
            asort($listUser, 'cotisation');
            foreach ($listUser as $user) {
                echo '<tr>
                    <td>' . $user['IdAdherent'] . '</td>
                    <td>' . $user['Nom'] . '</td>
                    <td>' . $user['Prenom'] . '</td>
                    <td>' . $user['Mail'] . '</td>
                    <td>' . $user['Adresse'] . '</td>
                    <td>' . $user['adhesion'] . '</td>
                    <td>' . $user['cotisation'] . '</td>
                    <td>
                        <form action = "" method="post">
                            <input type="hidden" name="userCot" value="'.$user['IdAdherent'].'">
                            <button type="submit" class="btn btn-primary" name="Cotisation" value=' . $user['IdAdherent'] . ' >Cotise</button>
                        </form>
                    </td>
                 </tr>';
            }?>
        </table>
    </div>
</div>