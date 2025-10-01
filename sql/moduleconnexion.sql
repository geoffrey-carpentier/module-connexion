<?php

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
); // Crée une table pour stocker les informations des utilisateurs avec un identifiant unique, un login, un prénom, un nom et un mot de passe haché.
?>  
