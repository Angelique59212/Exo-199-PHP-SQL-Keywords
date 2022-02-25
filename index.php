<?php
require 'Connect.php';
require 'Config.php';

$myConnexion = Connect::dbConnect();

//Select distinct

$stmt = $myConnexion->prepare("SELECT prenom,nom,pays FROM users ");

$stmt = $myConnexion->prepare("SELECT DISTINCT pays FROM users");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Pays: </h1>";
    foreach ($stmt->fetchAll() as $user) {
        echo $user['pays']."<br>";
    }
}

//Order by

$stmt = $myConnexion->prepare("SELECT * FROM users ORDER BY nom ASC ");

$stmt = $myConnexion->prepare("SELECT * FROM users ORDER BY nom DESC");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Ordre décroissant: </h1>";
    foreach ($stmt->fetchAll() as $user) {
        echo $user['nom']."<br>";
    }
}

//MIN MAX

$stmt = $myConnexion->prepare("SELECT MIN(argent) FROM users");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Valeur minimum: </h1>";
    foreach ($stmt->fetch() as $item) {
        echo $item."<br>";
    }
}

$stmt = $myConnexion->prepare("SELECT MAX(argent) FROM users");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Valeur maximum: </h1>";
    foreach ($stmt->fetch() as $item) {
        echo $item."<br>";
    }
}

//Avec Alias

$stmt = $myConnexion->prepare("SELECT MIN(argent) as argentMin FROM users WHERE 1");
$state = $stmt->execute();
if ($state) {
    foreach ($stmt->fetch() as $item) {
        echo "Valeur minimum: ".$item."<br>";
    }
}

//COUNT

$stmt = $myConnexion->prepare("SELECT COUNT(*) FROM users WHERE argent < 50000");
$state = $stmt->execute();
if ($state) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $user)
        echo "Nombre d'utilisateurs ayant moins de 50000€: ".$user."<br>";
    }
}

//AVG

$stmt = $myConnexion->prepare("SELECT AVG(argent) FROM users");
$state = $stmt->execute();
if ($state) {
    foreach ($stmt->fetch() as $item) {
        echo "Moyenne des valeurs de la colonne argent: ".$item."<br>";
    }
}

//SUM

$stmt = $myConnexion->prepare("SELECT SUM(argent) FROM users");
$state = $stmt->execute();
if ($state) {
    foreach ($stmt->fetch() as $item) {
        echo "Somme des valeurs de la colonne argent: ".$item."<br>";
    }
}


//LIKE

$stmt = $myConnexion->prepare("SELECT * FROM users WHERE prenom LIKE 'j%'");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Liste des prenoms qui commencent par J: </h1>";
    foreach ($stmt->fetchAll() as $item) {
        foreach ($item as  $user) {
            echo $user ."<br>";
        }

    }
}

$stmt = $myConnexion->prepare("SELECT * FROM users WHERE prenom LIKE '%s'");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Liste des prenoms qui terminent par S: </h1>";
    foreach ($stmt->fetchAll() as $item) {
        foreach ($item as  $user) {
            echo $user ."<br>";
        }

    }
}

$stmt = $myConnexion->prepare("SELECT * FROM users WHERE prenom LIKE '%a%'");
$state = $stmt->execute();
if ($state) {
    echo "<h1>Liste des prenoms qui contiennent la lettre A: </h1>";
    foreach ($stmt->fetchAll() as $item) {
        foreach ($item as  $user) {
            echo $user ."<br>";
        }

    }
}











