<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include 'menu.php';?>
        <title><?php echo $title;?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <header>
            <!-- Fixed navbar -->
            
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <span class="navbar-brand text-center text-white">
                            <h2>BIBLIOTHEQUE</h2>
                    </span>
                    <ul class="navbar-nav mr-auto">
                        <?php foreach($pages as $menu=>$info){ ?>
                        <li class="nav-item active">
                            <a href="?page=<?php echo $menu?>"><?= $info['title']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <button class="btn my-2 my-sm-0" type="button" href="../index.php">Déconnexion</button>
                </div>
            </nav>
        </header>
