# 📦 Guide d'installation - Module Connexion

Ce guide vous accompagne pas à pas dans l'installation du projet sur votre serveur local ou distant.

## 🔧 Prérequis

Avant de commencer, assurez-vous d'avoir :

- ✅ PHP 7.4 ou supérieur
- ✅ MySQL 5.7 ou supérieur (ou MariaDB)
- ✅ Un serveur web (Apache, Nginx, ou autre)
- ✅ PHPMyAdmin (optionnel mais recommandé)

### Avec XAMPP (Windows/Mac/Linux)
XAMPP inclut tout ce dont vous avez besoin : Apache, MySQL, PHP et PHPMyAdmin.

### Avec WAMP (Windows)
WAMP est une alternative à XAMPP pour Windows.

### Avec MAMP (Mac)
MAMP est l'équivalent pour macOS.

## 📥 Étape 1 : Télécharger le projet

### Option A : Avec Git (recommandé)

```bash
# Cloner le repository
git clone https://github.com/geoffrey-carpentier/module-connexion.git

# Se déplacer dans le dossier
cd module-connexion
```

### Option B : Téléchargement direct

1. Aller sur [le repository GitHub](https://github.com/geoffrey-carpentier/module-connexion)
2. Cliquer sur "Code" puis "Download ZIP"
3. Extraire l'archive dans votre dossier web

## 📁 Étape 2 : Placer les fichiers

### Avec XAMPP
Placer le dossier dans : `C:\xampp\htdocs\` (Windows) ou `/opt/lampp/htdocs/` (Linux)

### Avec WAMP
Placer le dossier dans : `C:\wamp64\www\`

### Avec MAMP
Placer le dossier dans : `/Applications/MAMP/htdocs/`

### Avec un serveur distant (Plesk, cPanel, etc.)
Utiliser FTP/SFTP pour uploader les fichiers dans le dossier `public_html` ou `www`

## 🗄️ Étape 3 : Créer la base de données

### Méthode 1 : Avec PHPMyAdmin (le plus simple)

1. Ouvrir PHPMyAdmin dans votre navigateur :
   - XAMPP : `http://localhost/phpmyadmin`
   - WAMP : `http://localhost/phpmyadmin`
   - MAMP : `http://localhost:8888/phpMyAdmin`

2. Cliquer sur "Nouveau" dans la barre latérale gauche

3. Créer une nouvelle base de données :
   - Nom : `moduleconnexion`
   - Interclassement : `utf8mb4_unicode_ci`
   - Cliquer sur "Créer"

4. Importer la structure :
   - Sélectionner la base de données `moduleconnexion`
   - Cliquer sur l'onglet "Importer"
   - Choisir le fichier `moduleconnexion.sql`
   - Cliquer sur "Exécuter"

### Méthode 2 : En ligne de commande

```bash
# Se connecter à MySQL
mysql -u root -p

# Créer la base de données
CREATE DATABASE moduleconnexion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Utiliser la base de données
USE moduleconnexion;

# Importer le fichier SQL
SOURCE /chemin/vers/moduleconnexion.sql;

# Quitter
EXIT;
```

## ⚙️ Étape 4 : Configuration de la connexion

1. Ouvrir le fichier `db.php` avec un éditeur de texte

2. Vérifier/modifier les paramètres de connexion :

```php
define('DB_HOST', 'localhost');        // Généralement 'localhost'
define('DB_NAME', 'moduleconnexion');  // Ne pas changer
define('DB_USER', 'root');             // Utilisateur MySQL
define('DB_PASS', '');                 // Mot de passe MySQL (vide par défaut en local)
```

3. **Pour un serveur distant**, modifier selon vos informations d'hébergement :

```php
define('DB_HOST', 'votre_hote');       // Ex: mysql.votreserveur.com
define('DB_NAME', 'moduleconnexion');
define('DB_USER', 'votre_utilisateur');
define('DB_PASS', 'votre_mot_de_passe');
```

## 🚀 Étape 5 : Tester l'installation

1. Démarrer vos services :
   - **XAMPP** : Démarrer Apache et MySQL
   - **WAMP** : Démarrer tous les services
   - **MAMP** : Démarrer les serveurs

2. Ouvrir votre navigateur et accéder à :
   ```
   http://localhost/module-connexion/
   ```
   ou
   ```
   http://localhost:8888/module-connexion/  (MAMP)
   ```

3. Vous devriez voir la page d'accueil du module !

## 🔐 Étape 6 : Premier test de connexion

Le compte administrateur est créé automatiquement :

- **Login :** `admin`
- **Mot de passe :** `admin`

1. Cliquer sur "Connexion"
2. Entrer les identifiants admin
3. Vous devriez être connecté et redirigé vers votre profil

⚠️ **IMPORTANT :** Changez le mot de passe admin immédiatement !

## ✅ Vérification de l'installation

Vérifiez que tout fonctionne :

- [ ] La page d'accueil s'affiche correctement
- [ ] Vous pouvez créer un nouveau compte (inscription)
- [ ] Vous pouvez vous connecter avec le compte créé
- [ ] Vous pouvez modifier votre profil
- [ ] La connexion admin fonctionne
- [ ] La page admin est accessible (uniquement pour admin)
- [ ] Vous pouvez vous déconnecter

## 🐛 Résolution des problèmes courants

### Erreur "Connexion à la base de données impossible"

**Causes possibles :**
- MySQL n'est pas démarré
- Les identifiants de connexion sont incorrects
- La base de données n'existe pas

**Solutions :**
1. Vérifier que MySQL est bien démarré
2. Vérifier les paramètres dans `db.php`
3. Vérifier que la base `moduleconnexion` existe

### Erreur "Page blanche"

**Causes possibles :**
- Erreur PHP non affichée
- Problème de permissions

**Solutions :**
1. Activer l'affichage des erreurs PHP :
   ```php
   // Ajouter en haut du fichier index.php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ```
2. Vérifier les permissions des fichiers (755 pour les dossiers, 644 pour les fichiers)

### Erreur "Session not started"

**Causes possibles :**
- Problème de permissions sur le dossier de sessions

**Solutions :**
1. Vérifier que le dossier `/tmp` existe et est accessible
2. Sous Windows, vérifier `C:\xampp\tmp`

### Les styles CSS ne s'appliquent pas

**Causes possibles :**
- Chemin incorrect vers le fichier CSS
- Cache du navigateur

**Solutions :**
1. Vérifier que `style.css` est bien dans le même dossier
2. Vider le cache du navigateur (Ctrl+F5 ou Cmd+Shift+R)
3. Vérifier la console du navigateur (F12) pour les erreurs

## 🌐 Déploiement sur un serveur distant

### Avec Plesk

1. Se connecter à Plesk
2. Aller dans "Gestionnaire de fichiers"
3. Uploader tous les fichiers dans `httpdocs` ou créer un sous-dossier
4. Créer la base de données via "Bases de données"
5. Importer le fichier SQL
6. Modifier `db.php` avec les bonnes informations
7. Tester l'accès via votre domaine

### Avec cPanel

1. Se connecter à cPanel
2. Utiliser "Gestionnaire de fichiers" ou FTP
3. Uploader dans `public_html`
4. Créer la base de données via "MySQL Databases"
5. Importer via phpMyAdmin
6. Configurer `db.php`

### Avec FTP (FileZilla, etc.)

1. Se connecter via FTP à votre serveur
2. Naviguer vers le dossier web (`public_html`, `www`, etc.)
3. Uploader tous les fichiers
4. Créer la base de données via l'interface de votre hébergeur
5. Configurer `db.php`

## 📧 Support

Si vous rencontrez des problèmes non résolus par ce guide :

1. Vérifier les [Issues GitHub](https://github.com/geoffrey-carpentier/module-connexion/issues)
2. Créer une nouvelle Issue avec :
   - Description du problème
   - Message d'erreur (si applicable)
   - Configuration (OS, PHP, MySQL)
   - Étapes pour reproduire le problème

## 🎉 Installation réussie !

Félicitations ! Votre module de connexion est maintenant opérationnel.

Prochaines étapes recommandées :
1. Changer le mot de passe admin
2. Créer quelques comptes de test
3. Explorer les fonctionnalités
4. Personnaliser le design si nécessaire

Bon développement ! 🚀
