<?php
require_once 'config.php';
require_once 'functions.php';

// Si déjà connecté, rediriger vers l'accueil
if (isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Token de sécurité invalide.';
    } else {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($login) || empty($password)) {
            $error = 'Tous les champs sont obligatoires.';
        } else {
            // Rechercher l'utilisateur par nom d'utilisateur ou email
            $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = ? OR email = ?");
            $stmt->execute([$login, $login]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Authentification réussie
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_admin'] = $user['is_admin'];
                
                header('Location: index.php');
                exit();
            } else {
                $error = 'Nom d\'utilisateur/email ou mot de passe incorrect.';
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
    <title>Connexion - Module Connexion</title>
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
            <h1>Connexion</h1>
            
            <?php if ($error): ?>
                <div class="message error"><?php echo escape($error); ?></div>
            <?php endif; ?>

            <form method="POST" action="signin.php">
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                
                <div class="form-group">
                    <label for="login">Nom d'utilisateur ou email</label>
                    <input type="text" id="login" name="login" required 
                           value="<?php echo isset($_POST['login']) ? escape($_POST['login']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>

            <div class="text-center">
                <p>Pas encore de compte ? <a href="signup.php">S'inscrire</a></p>
            </div>
        </div>
    </div>
</body>
</html>
