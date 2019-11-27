<?php
    try {

        require 'connectdb.php';

        echo 'Je suis connecté à la base de donnée';

        $request = "CREATE TABLE IF NOT EXISTS company(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->exec($request);

        echo 'table company créee';

        $request = "CREATE TABLE IF NOT EXISTS outlet(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (255)
        )";
        $connexion->exec($request);

        echo 'table outlet créee';

        $request = "CREATE TABLE IF NOT EXISTS powers(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            typepower VARCHAR (5)
        )";
        $connexion->exec($request);

        echo 'table powers créee';

        $request = "CREATE TABLE IF NOT EXISTS access(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR (20)
        )";
        $connexion->exec($request);

        echo 'table access créee';

    // table county
    $request="CREATE TABLE IF NOT EXISTS county(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(200),
        PRIMARY KEY (id)
        )";
        $connexion->exec($request);
        echo 'table county créee';
    
        // ici create table 
        $request="CREATE TABLE IF NOT EXISTS departments(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(200),
        county_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (county_id) REFERENCES county(id)
        )";
        $connexion->exec($request);
        echo 'table departments créee';
    
        // ici create table 
        $request="CREATE TABLE IF NOT EXISTS city(
        id INT AUTO_INCREMENT NOT NULL,
        nom VARCHAR(100),
        departments_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (departments_id) REFERENCES departments(id)
        )";
        $connexion->exec($request);
        echo 'table city créee';

        $request = "CREATE TABLE IF NOT EXISTS street(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR (255),
        city_id INT,
        FOREIGN KEY (city_id) REFERENCES city(id)
        )";
        $connexion->exec($request);

        echo 'table street créee';

    $request = "CREATE TABLE IF NOT EXISTS terminal(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR (255),
        latitude INT (50),
        longitude INT (50),
        accessibility VARCHAR (20),
        company_id INT,
        outlet_id INT,
        powers_id INT,
        access_id INT,
        street_id INT,
        FOREIGN KEY (company_id) REFERENCES company(id),
        FOREIGN KEY (outlet_id) REFERENCES outlet(id),
        FOREIGN KEY (powers_id) REFERENCES powers(id),
        FOREIGN KEY (access_id) REFERENCES access(id),
        FOREIGN KEY (street_id) REFERENCES street(id)
        )";
        $connexion->exec($request);

        echo 'table terminal créee';

    // ici create table 
    $request="CREATE TABLE IF NOT EXISTS roles(
        id INT AUTO_INCREMENT NOT NULL,
        nom_du_role VARCHAR(200),
        PRIMARY KEY (id)
        )";
        $connexion->exec($request);
        echo 'table roles créee';

        // ici create  table 
        $request="CREATE TABLE IF NOT EXISTS users(
        id INT AUTO_INCREMENT NOT NULL,
        pseudo VARCHAR(200),
        email VARCHAR(200),
        mot_de_passe VARCHAR(100),
        roles_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (roles_id) REFERENCES roles(id)
        )";
        $connexion->exec($request);
        echo 'table users créee';

        $request="CREATE TABLE IF NOT EXISTS commentary(
        id INT AUTO_INCREMENT NOT NULL,
        texte VARCHAR(200),
        dates DATETIME,
        terminal_id INT,
        users_id INT,
        PRIMARY KEY (id),
        FOREIGN KEY (terminal_id) REFERENCES terminal(id),
        FOREIGN KEY (users_id) REFERENCES users(id)
        )";
        $connexion->exec($request);

        echo 'table commentary créee';

    } catch (PDOException $error) {
        die($error);
    }

?>