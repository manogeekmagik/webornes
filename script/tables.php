<?php
    $servername = "localhost";
    $username = "dmhma";
    $password = "webornes5";
    $dbname = "webornes";

    
    try {

        $connexion = new PDO('mysql:host=localhost', $username, $password);

        $request = "CREATE TABLE IF NOT EXISTS company(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->execute($request);

        echo 'table company créee';

        $request = "CREATE TABLE IF NOT EXISTS outlet(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->execute($request);

        echo 'table outlet créee';

        $request = "CREATE TABLE IF NOT EXISTS powers(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            typepower INT NOT NULL(4)
        )";
        $connexion->execute($request);

        echo 'table powers créee';

        $request = "CREATE TABLE IF NOT EXISTS access(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (20)
        )";
        $connexion->execute($request);

        echo 'table access créee';

        $request = "CREATE TABLE IF NOT EXISTS terminal(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255),
            latitude int (50);
            longitude int (50);
            accessibility VARCHAR (20)
        )";
        $connexion->execute($request);

        echo 'table terminal créee';

        // table county
        $request="CREATE TABLE IF NOT EXISTS county(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(200),
        PRIMARY KEY (id)
        )";
        $connexion->execute($request);
        echo 'table county créee';
    
        // ici create table 
        $request="CREATE TABLE IF NOT EXISTS departments(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(200),
        county_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (county_id) REFERENCES county(id)
        )";
        $connexion->execute($request);
        echo 'table departments créee';
    
        // ici create table 
        $request="CREATE TABLE IF NOT EXISTS city(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(100),
        departments_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (departments_id) REFERENCES departments(id)
        )";
        $connexion->execute($request);
        echo 'table city créee';

        $request = "CREATE TABLE IF NOT EXISTS street(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR (255)
        )";
        $connexion->execute($request);

        echo 'table street créee';

        // ici create table 
        $request="CREATE TABLE IF NOT EXISTS roles(
        id INT AUTO_INCREMENT NOT NULL,
        nom_du_role VARCHAR(200),
        PRIMARY KEY (id)
        )";
        $connexion->execute($request);
        echo 'table roles créee';

        // ici create  table 
        $request="CREATE TABLE IF NOT EXISTS users(
        id INT AUTO_INCREMENT NOT NULL,
        pseudo VARCHAR(200),
        mot_de_passe VARCHAR(100),
        roles_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (roles_id) REFERENCES roles(id)
        )";
        $connexion->execute($request);
        echo 'table users créee';
        // ici create  table 
        $request="CREATE TABLE IF NOT EXISTS commentary(
        id INT AUTO_INCREMENT NOT NULL,
        texte VARCHAR(200),
        datetime2, 
        users_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (users_id) REFERENCES users(id)
        )";
        $connexion->execute($request);
        echo 'table users créee';


    } catch (PDOException $error) {
        die($error);
    }


?>