    <nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top bg-dark">
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left ml-auto">
                    <li><a id="logoAcceuil"  class="navbar-brand" href="?page=acceuil"><span class="glyphicon glyphicon-home"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right mr-auto">
                    <li ><a href="?page=compte"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['Nom']; ?> </a></li>
                    <li>
                        <a href="/fonctions/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <?php printMenu('admin'); ?>
                </ul>
            </div>

