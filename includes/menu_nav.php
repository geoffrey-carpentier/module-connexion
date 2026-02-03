<!-- Exemple dans includes/header.php -->
<nav>
    <a href="index.php">Accueil</a>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Utilisateur connecté -->
        <a href="profil.php">Mon Profil</a>
        
        <?php if ($_SESSION['login'] === 'admin'): ?>
            <a href="admin.php">Administration</a>
        <?php endif; ?>
        
        <a href="deconnexion.php">Déconnexion</a>
    <?php else: ?>
        <!-- Utilisateur non connecté -->
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    <?php endif; ?>
</nav>