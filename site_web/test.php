<?php 

include 'config_bdd.php';

$req="SELECT * FROM Adherant;";

$result=$bdd->query($req);
$result->execute();

$test=$result->fetch();

echo $test['MDP'];
echo $test['Nom'];
?>