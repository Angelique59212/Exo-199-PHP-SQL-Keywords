<?php
require 'Connect.php';
require 'Config.php';

$myConnexion = Connect::dbConnect();

$stmt = $myConnexion->prepare("SELECT prenom,nom,pays FROM users ");

$stmt = $myConnexion->prepare("SELECT DISTINCT pays FROM users");
$state = $stmt->execute();
if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "Pays: ".$user['pays']."<br>";
    }
}









