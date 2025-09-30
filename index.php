<?php
require_once 'config.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Module Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Module Connexion</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <?php if (isLoggedIn()): ?>
                    <li><a href="profil.php">Profil</a></li>
                    <?php if (isAdmin()): ?>
                        <li><a href="admin.php">Administration</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="signin.php">Connexion</a></li>
                    <li><a href="signup.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <div class="welcome">
                <h1>Bienvenue</h1>
                <?php if (isLoggedIn()): ?>
                    <p>Bonjour, <strong><?php echo escape($_SESSION['username']); ?></strong> !</p>
                    <p>Vous êtes connecté au système.</p>
                    <?php if (isAdmin()): ?>
                        <p class="badge badge-admin">Administrateur</p>
                    <?php endif; ?>
                    <div style="margin-top: 2rem;">
                        <a href="profil.php" class="btn btn-primary" style="display: inline-block; width: auto; padding: 0.75rem 2rem; text-decoration: none;">Voir mon profil</a>
                    </div>
                <?php else: ?>
                    <p>Module de connexion et gestion des utilisateurs</p>
                    <p>Connectez-vous ou créez un compte pour accéder à votre profil.</p>
                    <div style="margin-top: 2rem;">
                        <a href="signin.php" class="btn btn-primary" style="display: inline-block; width: auto; padding: 0.75rem 2rem; text-decoration: none; margin: 0.5rem;">Connexion</a>
                        <a href="signup.php" class="btn btn-secondary" style="display: inline-block; width: auto; padding: 0.75rem 2rem; text-decoration: none; margin: 0.5rem;">Inscription</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
