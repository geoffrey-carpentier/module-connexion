# Module Connexion - Caractéristiques Techniques

## Architecture

### Structure de fichiers
```
module-connexion/
├── config.php          # Configuration PDO et connexion BDD
├── functions.php       # Fonctions utilitaires et sessions
├── database.sql        # Schéma de base de données
├── style.css          # Styles CSS (317 lignes)
├── index.php          # Page d'accueil (58 lignes)
├── signup.php         # Inscription (119 lignes)
├── signin.php         # Connexion (97 lignes)
├── profil.php         # Profil utilisateur (172 lignes)
├── admin.php          # Panel admin (146 lignes)
└── logout.php         # Déconnexion (22 lignes)
```

## Base de données

### Table Users
```sql
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- username (VARCHAR(50), UNIQUE, NOT NULL)
- email (VARCHAR(100), UNIQUE, NOT NULL)
- password (VARCHAR(255), NOT NULL)
- is_admin (TINYINT(1), DEFAULT 0)
- created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
- updated_at (TIMESTAMP, AUTO UPDATE)
```

## Fonctionnalités par page

### 1. index.php (Accueil)
- Navigation dynamique selon statut de connexion
- Affichage du nom d'utilisateur connecté
- Badge administrateur
- Liens vers connexion/inscription ou profil

### 2. signup.php (Inscription)
**Validations:**
- Tous les champs obligatoires
- Username: 3-50 caractères
- Email: format valide
- Password: minimum 6 caractères
- Confirmation de mot de passe
- Unicité username/email

**Sécurité:**
- Token CSRF
- Password hashing (bcrypt)
- Validation serveur

### 3. signin.php (Connexion)
**Fonctionnalités:**
- Connexion avec username OU email
- Vérification mot de passe hashé
- Création session
- Redirection automatique si déjà connecté

**Session:**
- user_id
- username
- email
- is_admin

### 4. profil.php (Profil)
**Accès:** Utilisateurs connectés uniquement

**Fonctionnalités:**
- Affichage informations utilisateur
- Modification username/email
- Changement mot de passe (optionnel)
- Vérification mot de passe actuel
- Validation des nouvelles données

### 5. admin.php (Administration)
**Accès:** Administrateurs uniquement

**Fonctionnalités:**
- Liste complète des utilisateurs
- Colonnes: ID, Username, Email, Statut, Date
- Promotion/Rétrogradation admin
- Suppression utilisateurs
- Protection contre auto-modification
- Confirmations avant actions critiques
- Statistiques (total users, admins)

### 6. logout.php (Déconnexion)
- Destruction session
- Suppression cookies
- Redirection accueil

## Sécurité

### Protection CSRF
```php
generateCsrfToken()  // Génération token
verifyCsrfToken()    // Vérification token
```

### Gestion mots de passe
```php
password_hash($password, PASSWORD_DEFAULT)  // Hashing
password_verify($password, $hash)           // Vérification
```

### Protection SQL Injection
```php
$stmt = $pdo->prepare("SELECT * FROM Users WHERE username = ?");
$stmt->execute([$username]);
```

### Protection XSS
```php
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
```

### Contrôle d'accès
```php
requireLogin()   // Redirection si non connecté
requireAdmin()   // Redirection si non admin
isLoggedIn()     // Vérification statut connexion
isAdmin()        // Vérification privilèges admin
```

## Style CSS

### Design
- Gradient background (purple theme)
- Card-based layout
- Responsive design
- Shadow effects
- Smooth transitions

### Composants
- Forms stylisés
- Boutons avec hover effects
- Messages success/error/info
- Navigation responsive
- Tables admin
- Badges statut

### Responsive
- Mobile-friendly
- Breakpoint: 768px
- Navigation adaptative
- Tables scrollables

## Configuration requise

### Serveur
- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx

### PHP Extensions
- PDO
- pdo_mysql
- mbstring
- session

## Compte par défaut

**Administrateur:**
- Username: `admin`
- Email: `admin@example.com`
- Password: `admin123`

⚠️ Modifier le mot de passe après installation!

## Installation rapide

```bash
# 1. Importer la base de données
mysql -u root -p < database.sql

# 2. Configurer config.php si nécessaire

# 3. Démarrer le serveur
php -S localhost:8000

# 4. Accéder à http://localhost:8000
```

## Points forts

✅ Code PHP propre et structuré
✅ Sécurité renforcée (CSRF, SQL injection, XSS)
✅ Design moderne et responsive
✅ Gestion complète des sessions
✅ Panel admin fonctionnel
✅ Validation côté serveur
✅ Documentation complète
✅ Facilité d'installation

## Total
- **13 fichiers**
- **1,299 lignes de code**
- **5 pages PHP**
- **Temps d'installation: < 5 minutes**
