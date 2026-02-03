<?php
/**
 * Fichier de configuration de la base de données - EXEMPLE
 * 
 * Copiez ce fichier en db.php et modifiez les paramètres selon votre environnement
 * 
 * IMPORTANT: Le fichier db.php ne doit JAMAIS être commité sur GitHub
 * car il contient des informations sensibles
 */

// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');        // Hôte de la base de données
define('DB_NAME', 'moduleconnexion');  // Nom de la base de données
define('DB_USER', 'root');             // Nom d'utilisateur MySQL
define('DB_PASS', '');                 // Mot de passe MySQL (vide par défaut avec XAMPP/WAMP)

try {
    // Création de la connexion PDO
    $pdo = new PDO(
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
    // En production, ne jamais afficher les détails de l'erreur
    // Utilisez plutôt un système de logs
    die("Erreur de connexion à la base de données. Veuillez contacter l'administrateur.");
    
    // En développement, décommentez la ligne suivante pour voir l'erreur :
    // die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
