<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'moduleconnexion';
$user = 'root'; // ou ton nom d'utilisateur MySQL
$pass = '';     // ou ton mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

// Requête pour récupérer l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE login = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$login]);
$user = $stmt->fetch();

if ($user) {
    // Vérification du mot de passe
    if (password_verify($password, $user['password'])) {
        echo "Connexion réussie ! Bienvenue " . htmlspecialchars($user['prenom']);
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Utilisateur non trouvé.";
}
?>