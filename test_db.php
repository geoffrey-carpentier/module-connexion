<?php
/**
 * Script de test de connexion à la base de données
 * 
 * Ce fichier permet de vérifier que :
 * - La connexion à MySQL fonctionne
 * - La base de données existe
 * - La table utilisateurs est créée
 * - Le compte admin est présent
 * 
 * ⚠️ IMPORTANT : Supprimez ce fichier en production pour des raisons de sécurité !
 */

echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Test de connexion - Module Connexion</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            color: #1e293b;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2563eb;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 1rem;
        }
        .test {
            margin: 1.5rem 0;
            padding: 1rem;
            border-left: 4px solid #64748b;
            background: #f8fafc;
        }
        .success {
            border-left-color: #10b981;
            background: #d1fae5;
        }
        .error {
            border-left-color: #ef4444;
            background: #fee2e2;
        }
        .test h3 {
            margin: 0 0 0.5rem 0;
        }
        .test p {
            margin: 0.25rem 0;
        }
        .icon {
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }
        .warning {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-top: 2rem;
        }
        code {
            background: #e2e8f0;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🔍 Test de Connexion - Module Connexion</h1>";

$tests_passed = 0;
$tests_total = 5;

// Test 1 : Inclusion du fichier de configuration
echo "<div class='test";
try {
    require_once 'db.php';
    echo " success'>";
    echo "<h3><span class='icon'>✅</span>Test 1 : Fichier de configuration</h3>";
    echo "<p>Le fichier <code>db.php</code> a été chargé avec succès.</p>";
    $tests_passed++;
} catch (Exception $e) {
    echo " error'>";
    echo "<h3><span class='icon'>❌</span>Test 1 : Fichier de configuration</h3>";
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p>Vérifiez que le fichier <code>db.php</code> existe et est correctement configuré.</p>";
}
echo "</div>";

// Test 2 : Connexion à MySQL
if (isset($pdo)) {
    echo "<div class='test success'>";
    echo "<h3><span class='icon'>✅</span>Test 2 : Connexion à MySQL</h3>";
    echo "<p>La connexion à MySQL est établie avec succès.</p>";
    $tests_passed++;
    echo "</div>";
    
    // Test 3 : Vérification de la base de données
    echo "<div class='test";
    try {
        $stmt = $pdo->query("SELECT DATABASE() as db");
        $result = $stmt->fetch();
        if ($result['db'] === 'moduleconnexion') {
            echo " success'>";
            echo "<h3><span class='icon'>✅</span>Test 3 : Base de données</h3>";
            echo "<p>Base de données active : <code>" . htmlspecialchars($result['db']) . "</code></p>";
            $tests_passed++;
        } else {
            echo " error'>";
            echo "<h3><span class='icon'>❌</span>Test 3 : Base de données</h3>";
            echo "<p>Mauvaise base de données : <code>" . htmlspecialchars($result['db']) . "</code></p>";
            echo "<p>La base devrait être <code>moduleconnexion</code></p>";
        }
    } catch (PDOException $e) {
        echo " error'>";
        echo "<h3><span class='icon'>❌</span>Test 3 : Base de données</h3>";
        echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    echo "</div>";
    
    // Test 4 : Vérification de la table utilisateurs
    echo "<div class='test";
    try {
        $stmt = $pdo->query("SHOW TABLES LIKE 'utilisateurs'");
        if ($stmt->rowCount() > 0) {
            echo " success'>";
            echo "<h3><span class='icon'>✅</span>Test 4 : Table utilisateurs</h3>";
            echo "<p>La table <code>utilisateurs</code> existe.</p>";
            
            // Afficher la structure de la table
            $stmt = $pdo->query("DESCRIBE utilisateurs");
            $columns = $stmt->fetchAll();
            echo "<p><strong>Structure de la table :</strong></p>";
            echo "<ul>";
            foreach ($columns as $col) {
                echo "<li><code>" . htmlspecialchars($col['Field']) . "</code> - " . htmlspecialchars($col['Type']) . "</li>";
            }
            echo "</ul>";
            $tests_passed++;
        } else {
            echo " error'>";
            echo "<h3><span class='icon'>❌</span>Test 4 : Table utilisateurs</h3>";
            echo "<p>La table <code>utilisateurs</code> n'existe pas.</p>";
            echo "<p>Importez le fichier <code>moduleconnexion.sql</code> via PHPMyAdmin.</p>";
        }
    } catch (PDOException $e) {
        echo " error'>";
        echo "<h3><span class='icon'>❌</span>Test 4 : Table utilisateurs</h3>";
        echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    echo "</div>";
    
    // Test 5 : Vérification du compte admin
    echo "<div class='test";
    try {
        $stmt = $pdo->query("SELECT * FROM utilisateurs WHERE login = 'admin'");
        $admin = $stmt->fetch();
        
        if ($admin) {
            echo " success'>";
            echo "<h3><span class='icon'>✅</span>Test 5 : Compte administrateur</h3>";
            echo "<p>Le compte admin existe :</p>";
            echo "<ul>";
            echo "<li>ID : " . htmlspecialchars($admin['id']) . "</li>";
            echo "<li>Login : <code>" . htmlspecialchars($admin['login']) . "</code></li>";
            echo "<li>Prénom : " . htmlspecialchars($admin['prenom']) . "</li>";
            echo "<li>Nom : " . htmlspecialchars($admin['nom']) . "</li>";
            echo "<li>Mot de passe : " . (password_verify('admin', $admin['password']) ? "✅ Correct (hashé)" : "⚠️ Non standard") . "</li>";
            echo "</ul>";
            $tests_passed++;
        } else {
            echo " error'>";
            echo "<h3><span class='icon'>❌</span>Test 5 : Compte administrateur</h3>";
            echo "<p>Le compte admin n'existe pas dans la base de données.</p>";
            echo "<p>Exécutez cette requête SQL :</p>";
            echo "<code>INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('admin', 'admin', 'admin', '\$2y\$10\$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');</code>";
        }
    } catch (PDOException $e) {
        echo " error'>";
        echo "<h3><span class='icon'>❌</span>Test 5 : Compte administrateur</h3>";
        echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    echo "</div>";
    
    // Statistiques totales
    echo "<div class='test" . ($tests_passed === $tests_total ? " success" : " error") . "'>";
    echo "<h3><span class='icon'>" . ($tests_passed === $tests_total ? "🎉" : "📊") . "</span>Résumé des tests</h3>";
    echo "<p><strong>Tests réussis : $tests_passed / $tests_total</strong></p>";
    
    if ($tests_passed === $tests_total) {
        echo "<p>✅ Tous les tests sont passés ! Votre installation est opérationnelle.</p>";
        echo "<p>Vous pouvez maintenant accéder à : <a href='index.php' style='color: #2563eb; font-weight: 600;'>Page d'accueil</a></p>";
    } else {
        echo "<p>⚠️ Certains tests ont échoué. Veuillez corriger les erreurs ci-dessus.</p>";
    }
    echo "</div>";
    
} else {
    echo "<div class='test error'>";
    echo "<h3><span class='icon'>❌</span>Test 2 : Connexion à MySQL</h3>";
    echo "<p>Impossible de se connecter à MySQL.</p>";
    echo "<p>Vérifiez les paramètres dans <code>db.php</code></p>";
    echo "</div>";
}

echo "<div class='warning'>
        <h3>⚠️ Avertissement de sécurité</h3>
        <p><strong>Supprimez ce fichier <code>test_db.php</code> une fois les tests terminés !</strong></p>
        <p>Ce fichier expose des informations sensibles sur votre base de données et ne doit pas être accessible en production.</p>
      </div>";

echo "</div>
</body>
</html>";
?>
