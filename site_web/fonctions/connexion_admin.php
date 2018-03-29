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
            $req="SELECT * FROM Admin WHERE Nom = :login AND MDP = :password ";

            $result=$bdd->prepare($req);
            $result->execute(['login'=> $login , 'password'=>$password]);

            $data=$result->fetch();

            if($data['MDP'] == $password && $data['Nom'] == $login){

                $_SESSION['Nom'] = $data['Nom'];
                $_SESSION['Prenom'] = $data['Prenom'];
                $_SESSION['MDP'] = $data['MDP'];
                $_SESSION['Adresse'] = $data['Adresse'];
                $_SESSION['connect']=1;
                header('Location: ../admin/portail_admin.php?page=acceuil');
            }
            else{
                session_destroy();
                $err=TRUE;
                header('Location: ../signin_admin.php?err=user_err');
            }
        }
    }
}
?>

