<div class="container">

    <?php
        $recherche = '';
        if(isset($_POST['Recherche'])){
            $recherche = "HAVING R1 Like '%".$_POST['RechercheMot']."%' OR R2 LIKE '%".$_POST['RechercheMot']."%'";
        }
    ?>

    <div class="text-center">
        <form action = "" method="post">
            <input type="text" name = "RechercheMot">
            <button type="submit" class="btn btn-primary" name="Recherche" >Recherche</button>
        </form>
    </div>

    <h3>Liste des auteurs </h3><br>
    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        </tr>
    <?php
    $Auteurs = Auteur($recherche);
    foreach ($Auteurs as $Auteur) {
        echo '<tr>
                    <td>' . $Auteur['Nom'] . '</td>
                    <td>' . $Auteur['Prenom'] . '</td>
                    <td>' . '<form action = "?page=catalogue" method="post">
                        <button type="submit" class="btn btn-primary" name="RechAvAuteur" value=' . $Auteur['IdAuteur'] . ' >Voir ses oeuvres</button>
                        </form>' . '</td></tr>';
    }
    ?>
    </table>

</div>
