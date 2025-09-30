<?php
require_once 'config.php';
require_once 'functions.php';

// Vérifier que l'utilisateur est connecté
requireLogin();

$error = '';
$success = '';

// Récupérer les informations de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM Users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Token de sécurité invalide.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $current_password = $_POST['current_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // Validation des données
        if (empty($username) || empty($email)) {
            $error = 'Le nom d\'utilisateur et l\'email sont obligatoires.';
        } elseif (strlen($username) < 3 || strlen($username) > 50) {
            $error = 'Le nom d\'utilisateur doit contenir entre 3 et 50 caractères.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'L\'adresse email n\'est pas valide.';
        } else {
            // Vérifier si le nom d'utilisateur ou l'email est déjà utilisé par un autre utilisateur
            $stmt = $pdo->prepare("SELECT id FROM Users WHERE (username = ? OR email = ?) AND id != ?");
            $stmt->execute([$username, $email, $_SESSION['user_id']]);
            
            if ($stmt->fetch()) {
                $error = 'Ce nom d\'utilisateur ou cette adresse email est déjà utilisé.';
            } else {
                // Mise à jour des informations de base
                $update_fields = "username = ?, email = ?";
                $params = [$username, $email];
                
                // Si un nouveau mot de passe est fourni
                if (!empty($new_password)) {
                    if (empty($current_password)) {
                        $error = 'Veuillez entrer votre mot de passe actuel pour le modifier.';
                    } elseif (!password_verify($current_password, $user['password'])) {
                        $error = 'Le mot de passe actuel est incorrect.';
                    } elseif (strlen($new_password) < 6) {
                        $error = 'Le nouveau mot de passe doit contenir au moins 6 caractères.';
                    } elseif ($new_password !== $confirm_password) {
                        $error = 'Les nouveaux mots de passe ne correspondent pas.';
                    } else {
                        $update_fields .= ", password = ?";
                        $params[] = password_hash($new_password, PASSWORD_DEFAULT);
                    }
                }
                
                if (!$error) {
                    $params[] = $_SESSION['user_id'];
                    $stmt = $pdo->prepare("UPDATE Users SET $update_fields WHERE id = ?");
                    
                    if ($stmt->execute($params)) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;
                        $success = 'Profil mis à jour avec succès.';
                        
                        // Recharger les données de l'utilisateur
                        $stmt = $pdo->prepare("SELECT * FROM Users WHERE id = ?");
                        $stmt->execute([$_SESSION['user_id']]);
                        $user = $stmt->fetch();
                    } else {
                        $error = 'Une erreur est survenue lors de la mise à jour.';
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Module Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Module Connexion</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Profil</a></li>
                <?php if (isAdmin()): ?>
                    <li><a href="admin.php">Administration</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>Mon Profil</h1>
            
            <?php if ($error): ?>
                <div class="message error"><?php echo escape($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="message success"><?php echo escape($success); ?></div>
            <?php endif; ?>

            <div class="profile-info">
                <p><strong>ID :</strong> <?php echo escape($user['id']); ?></p>
                <p><strong>Statut :</strong> 
                    <?php if ($user['is_admin']): ?>
                        <span class="badge badge-admin">Administrateur</span>
                    <?php else: ?>
                        <span class="badge badge-user">Utilisateur</span>
                    <?php endif; ?>
                </p>
                <p><strong>Membre depuis :</strong> <?php echo date('d/m/Y', strtotime($user['created_at'])); ?></p>
            </div>

            <h2>Modifier mon profil</h2>

            <form method="POST" action="profil.php">
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required 
                           value="<?php echo escape($user['username']); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo escape($user['email']); ?>">
                </div>

                <hr style="margin: 2rem 0; border: none; border-top: 1px solid #e0e0e0;">

                <h3 style="margin-bottom: 1rem;">Changer le mot de passe (optionnel)</h3>

                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password">
                </div>

                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</body>
</html>
