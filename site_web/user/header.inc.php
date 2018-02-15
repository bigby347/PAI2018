<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
            include '../fonctions/menu.php';
            getPages();

        ?>
        <title><?php printTitle() ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
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
                            <a href="/fonctions/deconnexion.php"><span class="glyphicon glyphicon-user"></span> Déconnexion </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
<!--TODO: ajouter test de connection avec nom de session -->