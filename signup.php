<?php
require_once 'config.php';
require_once 'functions.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Token de sécurité invalide.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // Validation des données
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            $error = 'Tous les champs sont obligatoires.';
        } elseif (strlen($username) < 3 || strlen($username) > 50) {
            $error = 'Le nom d\'utilisateur doit contenir entre 3 et 50 caractères.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'L\'adresse email n\'est pas valide.';
        } elseif (strlen($password) < 6) {
            $error = 'Le mot de passe doit contenir au moins 6 caractères.';
        } elseif ($password !== $confirm_password) {
            $error = 'Les mots de passe ne correspondent pas.';
        } else {
            // Vérifier si l'utilisateur ou l'email existe déjà
            $stmt = $pdo->prepare("SELECT id FROM Users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);
            
            if ($stmt->fetch()) {
                $error = 'Ce nom d\'utilisateur ou cette adresse email est déjà utilisé.';
            } else {
                // Créer le nouvel utilisateur
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
                
                if ($stmt->execute([$username, $email, $hashed_password])) {
                    $success = 'Inscription réussie ! Vous pouvez maintenant vous connecter.';
                    // Redirection après 2 secondes
                    header("refresh:2;url=signin.php");
                } else {
                    $error = 'Une erreur est survenue lors de l\'inscription.';
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
    <title>Inscription - Module Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Module Connexion</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="signin.php">Connexion</a></li>
                <li><a href="signup.php">Inscription</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>Inscription</h1>
            
            <?php if ($error): ?>
                <div class="message error"><?php echo escape($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="message success"><?php echo escape($success); ?></div>
            <?php endif; ?>

            <form method="POST" action="signup.php">
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required 
                           value="<?php echo isset($_POST['username']) ? escape($_POST['username']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo isset($_POST['email']) ? escape($_POST['email']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>

                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>

            <div class="text-center">
                <p>Déjà un compte ? <a href="signin.php">Se connecter</a></p>
            </div>
        </div>
    </div>
</body>
</html>
