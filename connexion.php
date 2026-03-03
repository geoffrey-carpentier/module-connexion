<?php
session_start();
require_once 'db.php';

// Redirection si déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: profil.php');
    exit;
}

$errors = [];
$success_message = '';

// Message de succès après inscription
if (isset($_GET['inscription']) && $_GET['inscription'] === 'success') {
    $success_message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
}

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Validation
    if (empty($login)) {
        $errors[] = "Le login est obligatoire.";
    }
    
    if (empty($password)) {
        $errors[] = "Le mot de passe est obligatoire.";
    }
    
    // Vérification des identifiants
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie - Création des sessions
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];
            $_SESSION['user_prenom'] = $user['prenom'];
            $_SESSION['user_nom'] = $user['nom'];
            
            // Redirection
            header('Location: profil.php');
            exit;
        } else {
            $errors[] = "Login ou mot de passe incorrect.";
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
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Module Connexion</h1>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./inscription.php">Inscription</a></li>
                <li><a href="./connexion.php" class="active">Connexion</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <div class="form-container">
            <h2>Se connecter</h2>
            
            <?php if ($success_message): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input 
                        type="text" 
                        id="login" 
                        name="login" 
                        value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                    >
                </div>
                
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            
            <p class="text-center">
                Pas encore inscrit ? <a href="./inscription.php">Par ici</a>
            </p>
        </div>
    </main>
</body>
</html>
