<?php
/** En utilisant un fichier config.php séparé, on centralise la configuration de la base de données
 * plutot que d'integrer la connexion directement dans chaque page. 
 * Cela permet une maintenance facilitée (un seul fichier à modifier) et améliore la sécurité (infos de login isolées)
 * On peut réutiliser ce fichier "à volonté" avec "require_once '../config.php'" dans chaque page qui le nécessite */


//! Configuration de la BDD "moduleconnexion" (à adapter en fonction de notre configuration  locale) 
define('DB_HOST', 'localhost');
define('DB_NAME', 'moduleconnexion');
define('DB_USER', 'root');
define('DB_PASS', ''); 

//! Connexion PDO avec gestion d'erreurs
try {
    $pdo = new PDO(    // Création d'une instance PDO
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", // 
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Gestion des erreurs: 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Mode de récupération par défaut
        ]
    );
} catch (PDOException $e) {   // Gestion des erreurs de connexion à la BDD 
    die("Erreur de connexion : " . $e->getMessage());  // S'il y a une erreur, on arrête le script et un message d'erreur est affiché.
}