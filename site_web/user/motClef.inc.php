
<div class="container">

    <h3>Recherche pas mots clés </h3><br>
    <div class="row">
        <div class="col-sm-8" >
            <form action="?page=catalogue" method="post">
                <select multiple size="10" class="form-control" name="MC[]">
                <?php $MotsClefs = MotsClef();
                foreach ($MotsClefs as $MotClef) {
                    echo '<option value=' . $MotClef['IdMotClef'] . ' >' . $MotClef['Nom'] . '</option>';
                }
                ?>
                </select>
                <br>Rechercher :
                <button type="submit" class="btn btn-primary" name="RechMCOu" value=0 >Rechercher</button>

            </form>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">La recheche par mot clé</div>
                <div class="panel-body">Pour selectionner plusieur mots clef appuyer sur la touche Ctrl de votre clavier.</div>
            </div>
        </div>
    </div>

</div>