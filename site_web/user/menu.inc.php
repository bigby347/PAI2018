<?php include '/fonctions/menu.php';?>
<header>
    <!-- Fixed navbar -->
    <!--<nav class="navbar navbar-inverse">

            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>-->
    <nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a id="logoAcceuil"  class="navbar-brand" href="?page=acceuil"><span class="glyphicon glyphicon-home"></a>
            </div>

            <ul class="navbar-nav navbar-left ml-auto">
                <?php printMenu() ?>
            </ul>
            <ul class="nav navbar-nav navbar-right mr-auto">
                <li><a href="?page=compte"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['Nom']; ?> </a></li>
                <li>
                    <a href="/fonctions/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion </a>
                </li>
            </ul>
        </div>
    </nav>
</header>