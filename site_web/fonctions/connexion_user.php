<?php

include 'config_bdd.php';
$err=FALSE;

session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "login" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['login'])) {
        echo "Le champ login est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $login = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            //on se connecte à la base de données:
            $req="SELECT * FROM Adherent WHERE Mail = :login AND MDP= :password ";

            $result=$bdd->prepare($req);
            $result->execute(['login'=> $login , 'password'=>$password]);

            $data=$result->fetch();

            if($data['MDP'] == $password && $data['Mail'] == $login){
                $_SESSION['IdAdherent'] = $data['IdAdherent'];
                $_SESSION['Mail'] = $data['Nom'];
                $_SESSION['Nom'] = ucfirst($data['Nom']);
                $_SESSION['Prenom'] = ucfirst($data['Prenom']);
                $_SESSION['MDP'] = $data['MDP'];
                $_SESSION['Adresse'] = $data['Adresse'];
                $_SESSION['connect']=1;
                header('Location: /user/portail_user.php?page=acceuil');
            }
            else{
                session_destroy();
                $err=TRUE;
                header('Location: ../index.php?err=user_err');
            }
        }
    }
}
?>

