<?php
    $servername = "localhost";
    $username = "dmhma";
    $password = "webornes5";
    $dbname = "webornes";

    
    try {

        $connexion = new PDO('mysql:host=localhost', $username, $password);

        $request = "CREATE TABLE IF NOT EXISTS terminal(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255),
            latitude int (50);
            longitude int (50);
            accessibility VARCHAR (20)
        )";
        $connexion->execute($request);

        $request = "CREATE TABLE IF NOT EXISTS company(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->execute($request);

        $request = "CREATE TABLE IF NOT EXISTS outlet(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->execute($request);

        $request = "CREATE TABLE IF NOT EXISTS power(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            typepower INT NOT NULL(4)
        )";
        $connexion->execute($request);

        $request = "CREATE TABLE IF NOT EXISTS access(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (20)
        )";
        $connexion->execute($request);

        $request = "CREATE TABLE IF NOT EXISTS street(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->execute($request);


    } catch (PDOException $error) {
        die($error);
    }


?>