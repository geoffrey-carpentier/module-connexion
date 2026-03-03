<?php
session_start();
require_once 'db.php';

$errors = []; //
$success = false;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $login = trim($_POST['login'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($login)) {
        $errors[] = "Le login est obligatoire.";
    } elseif (strlen($login) < 3) {
        $errors[] = "Le login doit contenir au moins 3 caractères.";
    }
    
    if (empty($prenom)) {
        $errors[] = "Le prénom est obligatoire.";
    }
    
    if (empty($nom)) {
        $errors[] = "Le nom est obligatoire.";
    }
    
    if (empty($password)) {
        $errors[] = "Le mot de passe est obligatoire.";
    } elseif (strlen($password) < 5) {
        $errors[] = "Le mot de passe doit contenir au moins 5 caractères.";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }
    
    // Vérifier si le login existe déjà
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        if ($stmt->fetch()) {
            $errors[] = "Ce login est déjà utilisé.";
        }
    }
    
    // Insertion en base de données
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)");
        
        if ($stmt->execute([$login, $prenom, $nom, $password_hash])) {
            $success = true;
            header('Location: connexion.php?inscription=success');
            exit;
        } else {
            $errors[] = "Une erreur est survenue lors de l'inscription.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Connexion - Inscription</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Module Connexion</h1>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./inscription.php" class="active">Inscription</a></li>
                <li><a href="./connexion.php">Connexion</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <div class="form-container">
            <h2>Créer un compte</h2>
            
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
                    <label for="login">Login *</label>
                    <input 
                        type="text" 
                        id="login" 
                        name="login" 
                        value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="prenom">Prénom *</label>
                    <input 
                        type="text" 
                        id="prenom" 
                        name="prenom" 
                        value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input 
                        type="text" 
                        id="nom" 
                        name="nom" 
                        value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                    >
                    <small>Au moins 5 caractères</small>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirmer le mot de passe *</label>
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        required
                    >
                </div>
                
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
            
            <p class="text-center">
                Déjà un compte ? <a href="./connexion.php">Se connecter</a>
            </p>
        </div>
    </main>
</body>
</html>
