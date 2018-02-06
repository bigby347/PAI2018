<html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bibliothèque - Service d'authentification</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/signin.css">
  
  </head>

  <body class="text-center" style="background-image: url(/image/background_signin.jpg);">
    <form class="form-signin" action="connexion.php" method="post">
      <img class="mb-4" src="/image/icone_signin.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Authentification</h1>
      <label for="inputId" class="sr-only">Identifiant</label>
      <input type="text" id="inputId" class="form-control" placeholder="Identifiant" required="" autofocus="" name="login">
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required="" name="password">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi</input>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      <p class="mt-5 mb-3">© 2017-2018</p>
      <a href="/admin/signin_admin.php">Accés Admin</a>
    </form>
  </body>
</html>