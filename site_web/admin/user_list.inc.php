<div class="text-center">
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
        foreach ($listUser as $user) {
            echo '<tr>
                    <td>' . $user['IdAdherant'] . '</td>
                    <td>' . $user['Nom'] . '</td>
                    <td>' . $user['Prenom'] . '</td>
                    <td>' . $user['Mail'] . '</td>
                    <td>' . $user['Adresse'] . '</td>
                    <td>' . $user['adhesion'] . '</td>
                    <td>' . $user['cotisation'] . '</td>
                    <td>
                        <form action = "" method="post">
                            <button type="submit" class="btn btn-primary" name="profile" value=' . $user['IdAdherant'] . ' >Voir Profil</button>
                        </form>
                    </td>
                 </tr>';
        }?>
    </table>
</div>