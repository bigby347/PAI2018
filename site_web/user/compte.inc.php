<div class="container">
    <h2>Mon compte</h2>
    <dl class="dl-horizontal">
        <dt>Nom</dt>
        <dd><?= $_SESSION['Nom'];?></dd>
        <dt>Prénom</dt>
        <dd><?= $_SESSION['Prenom'];?></dd>
        <dt>Adresse</dt>
        <dd><?= $_SESSION['Adresse'];?></dd>
    </dl>
</div>
