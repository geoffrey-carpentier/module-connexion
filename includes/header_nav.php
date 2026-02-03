<?php        // includes/header.php: 
session_start();
$is_logged = isset($_SESSION['user_id']);
$is_admin = isset($_SESSION['login']) && $_SESSION['login'] === 'admin';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Module Connexion</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <a href=".=../index.php">Accueil</a>
        
        <?php if (!$is_logged): ?>
            <a href="../inscription.php">Inscription</a>
            <a href="../connexion.php">Connexion</a>
        <?php else: ?>
            <a href="../profil.php">Mon Profil</a>
            <?php if ($is_admin): ?>
                <a href="../admin.php">Administration</a>
            <?php endif; ?>
            <a href="../deconnexion.php">Déconnexion</a>
        <?php endif; ?>
    </nav>
    <main>