<?php
//! On initie une session
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Connexion - Accueil</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>🔐 Module Connexion</h1>
            <ul>
                <li><a href="./index.php" class="active">Accueil</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="./profil.php">Mon Profil</a></li>
                    <?php if ($_SESSION['user_login'] === 'admin'): ?>
                        <li><a href="./admin.php">Administration</a></li>
                    <?php endif; ?>
                    <li><a href="./deconnexion.php" class="btn-logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="./inscription.php">Inscription</a></li>
                    <li><a href="./connexion.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <div class="hero">
            <h2>Bienvenue sur le Module de Connexion</h2>
            <p class="subtitle">Leeloo Dallas Multipass !</p>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="welcome-message">
                    <h3>Bonjour <?php echo htmlspecialchars($_SESSION['user_prenom']); ?> ! 👋</h3>
                    <p>Vous êtes connecté en tant que <strong><?php echo htmlspecialchars($_SESSION['user_login']); ?></strong></p>
                    <div class="action-buttons">
                        <a href="profil.php" class="btn btn-primary">Voir mon profil</a>
                        <?php if ($_SESSION['user_login'] === 'admin'): ?>
                            <a href="./admin.php" class="btn btn-secondary">Panneau Admin</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="intro-section">
                    <div class="feature-grid">
                        <div class="feature-card">
                            <div class="feature-icon">📝</div>
                            <h3>Inscription</h3>
                            <p>Créez votre compte en quelques secondes avec un système sécurisé.</p>
                            <a href="./inscription.php" class="btn btn-primary">S'inscrire</a>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">🔑</div>
                            <h3>Connexion</h3>
                            <p>Accédez à votre espace personnel de manière sécurisée.</p>
                            <a href="./connexion.php" class="btn btn-secondary">Se connecter</a>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">👤</div>
                            <h3>Profil</h3>
                            <p>Gérez et modifiez vos informations personnelles à tout moment.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="info-section">
            <h3>À propos du projet</h3>
            <p>Ce module de connexion a été développé dans le cadre d'un projet pédagogique. Il permet aux utilisateurs de :</p>
            <ul class="features-list">
                <li>✅ Créer un compte utilisateur</li>
                <li>✅ Se connecter de manière sécurisée</li>
                <li>✅ Modifier leurs informations personnelles</li>
                <li>✅ Accéder à un panneau d'administration (pour les admins)</li>
            </ul>
        </div>
        
        <footer class="footer">
            <p>
                <a href="https://github.com/geoffrey-carpentier/module-connexion" target="_blank">
                    🔗 Voir le projet sur GitHub
                </a>
            </p>
            <p class="copyright">© 2025 - Module Connexion - Projet LaPlateforme</p>
        </footer>
    </main>
</body>
</html>
