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
    <?php
    printAuteur($recherche);
    ?>
</div>