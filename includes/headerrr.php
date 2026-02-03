<?php
session_start(); // Démarrer la session sur toutes les pages
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Module Connexion'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Menu pour utilisateurs connectés -->
                    <li><a href="profil.php">Mon Profil</a></li>
                    
                    <?php if ($_SESSION['login'] === 'admin'): ?>
                        <li><a href="admin.php">Administration</a></li>
                    <?php endif; ?>
                    
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php else: ?>
                    <!-- Menu pour visiteurs -->
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>