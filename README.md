# Module Connexion

Module de connexion et gestion des utilisateurs avec PHP PDO et MySQL.

## Fonctionnalités

- ✅ Inscription des utilisateurs avec validation
- ✅ Connexion sécurisée avec gestion des sessions
- ✅ Édition du profil utilisateur
- ✅ Panel d'administration pour gérer les utilisateurs
- ✅ Gestion des privilèges administrateur
- ✅ Protection CSRF
- ✅ Mots de passe hashés avec bcrypt
- ✅ Interface esthétique et responsive

## Structure du projet

```
module-connexion/
├── config.php          # Configuration de la base de données
├── functions.php       # Fonctions utilitaires et gestion des sessions
├── database.sql        # Script SQL pour créer la base de données
├── style.css          # Styles CSS
├── index.php          # Page d'accueil
├── signup.php         # Page d'inscription
├── signin.php         # Page de connexion
├── profil.php         # Page de profil utilisateur
├── admin.php          # Panel d'administration
└── logout.php         # Script de déconnexion
```

## Installation

### Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache, Nginx, etc.)

### Étapes d'installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/geoffrey-carpentier/module-connexion.git
   cd module-connexion
   ```

2. **Créer la base de données**
   - Importer le fichier `database.sql` dans votre serveur MySQL
   ```bash
   mysql -u root -p < database.sql
   ```
   - Ou via phpMyAdmin : importer le fichier `database.sql`

3. **Configurer la connexion à la base de données**
   - Ouvrir le fichier `config.php`
   - Modifier les paramètres de connexion si nécessaire :
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'moduleconnect');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```

4. **Démarrer le serveur**
   - Placer les fichiers dans le dossier de votre serveur web (htdocs, www, etc.)
   - Ou utiliser le serveur PHP intégré :
   ```bash
   php -S localhost:8000
   ```

5. **Accéder à l'application**
   - Ouvrir votre navigateur et accéder à : `http://localhost:8000` (ou votre URL)

## Utilisation

### Compte administrateur par défaut

Un compte administrateur est créé automatiquement lors de l'installation :
- **Username:** admin
- **Email:** admin@example.com
- **Password:** admin123

⚠️ **Important:** Changez le mot de passe administrateur après la première connexion !

### Pages disponibles

1. **index.php** - Page d'accueil
2. **signup.php** - Inscription d'un nouvel utilisateur
3. **signin.php** - Connexion
4. **profil.php** - Gestion du profil (utilisateur connecté)
5. **admin.php** - Panel d'administration (administrateurs uniquement)

## Sécurité

- Mots de passe hashés avec `password_hash()` (bcrypt)
- Protection contre les attaques CSRF
- Validation des données côté serveur
- Requêtes préparées PDO (protection SQL injection)
- Sessions sécurisées
- Échappement des données pour l'affichage

## Technologies utilisées

- **Backend:** PHP 7.4+ avec PDO
- **Base de données:** MySQL
- **Frontend:** HTML5, CSS3
- **Sécurité:** Sessions PHP, CSRF tokens, password hashing

## Licence

MIT License
