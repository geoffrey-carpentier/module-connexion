<?php
session_start();
require_once 'db.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit;
}

$errors = [];
$success = false;

// Récupérer les informations actuelles de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    session_destroy();
    header('Location: connexion.php');
    exit;
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $current_password = $_POST['current_password'] ?? '';
    
    // Validation du mot de passe actuel
    if (empty($current_password)) {
        $errors[] = "Veuillez entrer votre mot de passe actuel pour confirmer les modifications.";
    } elseif (!password_verify($current_password, $user['password'])) {
        $errors[] = "Le mot de passe actuel est incorrect.";
    }
    
    // Validation des autres champs
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
    
    // Vérifier si le login existe déjà (sauf pour l'utilisateur actuel)
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = ? AND id != ?");
        $stmt->execute([$login, $_SESSION['user_id']]);
        if ($stmt->fetch()) {
            $errors[] = "Ce login est déjà utilisé par un autre utilisateur.";
        }
    }
    
    // Validation du nouveau mot de passe (si fourni)
    if (!empty($new_password)) {
        if (strlen($new_password) < 5) {
            $errors[] = "Le nouveau mot de passe doit contenir au moins 5 caractères.";
        } elseif ($new_password !== $confirm_password) {
            $errors[] = "Les nouveaux mots de passe ne correspondent pas.";
        }
    }
    
    // Mise à jour en base de données
    if (empty($errors)) {
        if (!empty($new_password)) {
            // Mise à jour avec nouveau mot de passe
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ?, password = ? WHERE id = ?");
            $result = $stmt->execute([$login, $prenom, $nom, $password_hash, $_SESSION['user_id']]);
        } else {
            // Mise à jour sans changer le mot de passe
            $stmt = $pdo->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ? WHERE id = ?");
            $result = $stmt->execute([$login, $prenom, $nom, $_SESSION['user_id']]);
        }
        
        if ($result) {
            // Mettre à jour les variables de session
            $_SESSION['user_login'] = $login;
            $_SESSION['user_prenom'] = $prenom;
            $_SESSION['user_nom'] = $nom;
            
            // Recharger les données de l'utilisateur
            $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();
            
            $success = true;
        } else {
            $errors[] = "Une erreur est survenue lors de la mise à jour.";
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
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>🔐 Module Connexion</h1>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./profil.php" class="active">Mon Profil</a></li>
                <?php if ($_SESSION['user_login'] === 'admin'): ?>
                    <li><a href="./admin.php">Administration</a></li>
                <?php endif; ?>
                <li><a href="./deconnexion.php" class="btn-logout">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <div class="form-container">
            <h2>Mon Profil</h2>
            
            <div class="welcome-message" style="margin-bottom: 2rem;">
                <h3>Bienvenue <?php echo htmlspecialchars($user['prenom']); ?> <?php echo htmlspecialchars($user['nom']); ?> 👤</h3>
                <p>Vous pouvez modifier vos informations personnelles ci-dessous</p>
            </div>
            
            <?php if ($success): ?>
                <div class="alert alert-success">
                    ✅ Vos informations ont été mises à jour avec succès !
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
                    <label for="login">Login *</label>
                    <input 
                        type="text" 
                        id="login" 
                        name="login" 
                        value="<?php echo htmlspecialchars($user['login']); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="prenom">Prénom *</label>
                    <input 
                        type="text" 
                        id="prenom" 
                        name="prenom" 
                        value="<?php echo htmlspecialchars($user['prenom']); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input 
                        type="text" 
                        id="nom" 
                        name="nom" 
                        value="<?php echo htmlspecialchars($user['nom']); ?>"
                        required
                    >
                </div>
                
                <hr style="margin: 2rem 0; border: none; border-top: 2px solid var(--border-color);">
                
                <h3 style="margin-bottom: 1rem; color: var(--text-primary);">Changer de mot de passe (optionnel)</h3>
                
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input 
                        type="password" 
                        id="new_password" 
                        name="new_password"
                    >
                    <small>Laissez vide pour conserver votre mot de passe actuel</small>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password"
                    >
                </div>
                
                <hr style="margin: 2rem 0; border: none; border-top: 2px solid var(--border-color);">
                
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel * (requis pour valider)</label>
                    <input 
                        type="password" 
                        id="current_password" 
                        name="current_password"
                        required
                    >
                    <small>Pour des raisons de sécurité, vous devez confirmer votre mot de passe actuel</small>
                </div>
                
                <button type="submit" class="btn btn-primary">Mettre à jour mon profil</button>
            </form>
            
            <p class="text-center">
                <a href="index.php">Retour à l'accueil</a>
            </p>
        </div>
    </main>
</body>
</html>
