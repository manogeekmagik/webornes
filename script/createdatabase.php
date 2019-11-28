<?php
$servername = "localhost";
$username = "dmhma";
$password = "webornes5";
$dbname = "webornes";

// Create database +connexion
try {
    $connexion = new PDO("mysql:host=$servername;$dbname", $username,$password); 
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD:createdatabase.php
    
    $connexion->exec("CREATE DATABASE IF NOT EXISTS webornes CHARACTER SET utf8mb4 COLLATE utf8mb4_bin");
=======
>>>>>>> 41ada8578a6cb75ec07b74ca901e0c0123e01290:script/createdatabase.php
    
    $connexion->exec("CREATE DATABASE IF NOT EXISTS webornes CHARACTER SET utf8mb4 COLLATE utf8mb4_bin");

    echo 'Base de données crée'; 
    }
    catch(PDOException $e){
        echo 'Echec de la connexion : '.$e->getMessage();
    }