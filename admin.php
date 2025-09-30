<?php
require_once 'config.php';
require_once 'functions.php';

// Vérifier que l'utilisateur est connecté et admin
requireLogin();
requireAdmin();

$error = '';
$success = '';

// Traitement des actions (suppression, toggle admin)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Token de sécurité invalide.';
    } else {
        $action = $_POST['action'] ?? '';
        $user_id = $_POST['user_id'] ?? 0;

        if ($action === 'delete' && $user_id > 0) {
            // Ne pas permettre de se supprimer soi-même
            if ($user_id == $_SESSION['user_id']) {
                $error = 'Vous ne pouvez pas supprimer votre propre compte.';
            } else {
                $stmt = $pdo->prepare("DELETE FROM Users WHERE id = ?");
                if ($stmt->execute([$user_id])) {
                    $success = 'Utilisateur supprimé avec succès.';
                } else {
                    $error = 'Erreur lors de la suppression.';
                }
            }
        } elseif ($action === 'toggle_admin' && $user_id > 0) {
            // Ne pas permettre de se retirer les droits admin soi-même
            if ($user_id == $_SESSION['user_id']) {
                $error = 'Vous ne pouvez pas modifier vos propres privilèges.';
            } else {
                $stmt = $pdo->prepare("UPDATE Users SET is_admin = NOT is_admin WHERE id = ?");
                if ($stmt->execute([$user_id])) {
                    $success = 'Privilèges modifiés avec succès.';
                } else {
                    $error = 'Erreur lors de la modification.';
                }
            }
        }
    }
}

// Récupérer tous les utilisateurs
$stmt = $pdo->query("SELECT * FROM Users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Module Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Module Connexion</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="admin.php">Administration</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card card-large">
            <h1>Administration - Gestion des utilisateurs</h1>
            
            <?php if ($error): ?>
                <div class="message error"><?php echo escape($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="message success"><?php echo escape($success); ?></div>
            <?php endif; ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Date d'inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo escape($user['id']); ?></td>
                            <td><?php echo escape($user['username']); ?></td>
                            <td><?php echo escape($user['email']); ?></td>
                            <td>
                                <?php if ($user['is_admin']): ?>
                                    <span class="badge badge-admin">Admin</span>
                                <?php else: ?>
                                    <span class="badge badge-user">User</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo date('d/m/Y H:i', strtotime($user['created_at'])); ?></td>
                            <td class="actions">
                                <form method="POST" action="admin.php" style="display: inline;">
                                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                                    <input type="hidden" name="action" value="toggle_admin">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" class="btn btn-secondary" 
                                            <?php if ($user['id'] == $_SESSION['user_id']) echo 'disabled'; ?>
                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier les privilèges de cet utilisateur ?');">
                                        <?php echo $user['is_admin'] ? 'Retirer admin' : 'Rendre admin'; ?>
                                    </button>
                                </form>
                                <form method="POST" action="admin.php" style="display: inline;">
                                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" class="btn btn-danger" 
                                            <?php if ($user['id'] == $_SESSION['user_id']) echo 'disabled'; ?>
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 2rem;">
                <p><strong>Total d'utilisateurs :</strong> <?php echo count($users); ?></p>
                <p><strong>Administrateurs :</strong> <?php echo count(array_filter($users, function($u) { return $u['is_admin'] == 1; })); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
