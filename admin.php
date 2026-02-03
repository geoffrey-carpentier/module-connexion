<?php
session_start();
require_once 'db.php';

// Vérifier si l'utilisateur est connecté ET qu'ils est bien admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_login'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Récupérer tous les utilisateurs
$stmt = $pdo->query("SELECT id, login, prenom, nom, created_at FROM utilisateurs ORDER BY created_at DESC");
$users = $stmt->fetchAll();

// Pour calculer quelques statistiques
$total_users = count($users);
$admin_count = 0;
$regular_users = 0;

foreach ($users as $user) {
    if ($user['login'] === 'admin') {
        $admin_count++;
    } else {
        $regular_users++;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Module Connexion</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>🔐 Module Connexion</h1>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./profil.php">Mon Profil</a></li>
                <li><a href="./admin.php" class="active">Administration</a></li>
                <li><a href="./deconnexion.php" class="btn-logout">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <div class="hero">
            <h2>🛡️ Panneau d'Administration</h2>
            <p class="subtitle">Gestion des utilisateurs du système</p>
        </div>
        
        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3><?php echo $total_users; ?></h3>
                <p>Total Utilisateurs</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $admin_count; ?></h3>
                <p>Administrateurs</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $regular_users; ?></h3>
                <p>Utilisateurs Standard</p>
            </div>
        </div>
        
        <!-- Liste des utilisateurs -->
        <div class="table-container">
            <h3 style="margin-bottom: 1.5rem;">📋 Liste des utilisateurs</h3>
            
            <?php if (empty($users)): ?>
                <p style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                    Aucun utilisateur trouvé.
                </p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date d'inscription</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($user['login']); ?></strong>
                                </td>
                                <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                                <td><?php echo htmlspecialchars($user['nom']); ?></td>
                                <td>
                                    <?php 
                                    if ($user['created_at']) {
                                        $date = new DateTime($user['created_at']);
                                        echo $date->format('d/m/Y à H:i');
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($user['login'] === 'admin'): ?>
                                        <span style="background: #10b981; color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.875rem; font-weight: 600;">
                                            👑 Admin
                                        </span>
                                    <?php else: ?>
                                        <span style="background: #64748b; color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.875rem; font-weight: 600;">
                                            👤 Utilisateur
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        
        <div class="info-section" style="margin-top: 2rem;">
            <h3>ℹ️ Informations</h3>
            <p>Cette page est accessible uniquement aux administrateurs. Vous pouvez consulter ici la liste complète des utilisateurs inscrits sur le système.</p>
            <ul class="features-list">
                <li>✅ Vue d'ensemble de tous les utilisateurs</li>
                <li>✅ Statistiques en temps réel</li>
                <li>✅ Informations détaillées sur chaque compte</li>
                <li>✅ Distinction entre administrateurs et utilisateurs standard</li>
            </ul>
        </div>
        
        <p class="text-center" style="margin-top: 2rem;">
            <a href="./index.php" class="btn btn-secondary">← Retour à l'accueil</a>
        </p>
    </main>
</body>
</html>