<?php
//? On utilise un fichier db.php séparé, plutot que d'integrer la connexion directement dans chaque page. 
//? Cela permet une maintenance facilitée (un seul fichier à modifier) et améliore la sécurité (infos de login isolées)
//? On peut réutiliser ce fichier "à volonté" avec "require_once './db.php'" dans chaque page qui le nécessite */


//! Configuration de la BDD "moduleconnexion" (à adapter en fonction de notre configuration locale)

// On définit les paramètres de connexion (ici en local phpmyadmin/laragon)
define('DB_HOST', 'localhost');
define('DB_NAME', 'moduleconnexion');
define('DB_USER', 'root'); 
define('DB_PASS', '');    

try {  // On utilise try/catch pour gérer les erreurs de connexion:
    
    $pdo = new PDO(   // Création de la connexion PDO
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS, 
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());   // S'il y a une erreur, on arrête le script et un message d'erreur est affiché.
}
?>
