-- Création de la base de données
CREATE DATABASE IF NOT EXISTS moduleconnexion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utilisation de la base de données
USE moduleconnexion;

-- Création de la table utilisateurs
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; -- 

-- Insertion de l'utilisateur admin
-- Le mot de passe 'admin' est haché avec password_hash()
-- Hash généré : $2y$10$ZYT2ytuEj/osJmL/POHGued9oeaSSUWqQMtzrNNPhiX2pIxd74JAa (correspond à 'admin')

INSERT INTO utilisateurs (login, prenom, nom, password) VALUES 
('admin', 'admin', 'admin', '$2y$10$ZYT2ytuEj/osJmL/POHGued9oeaSSUWqQMtzrNNPhiX2pIxd74JAa'); 
