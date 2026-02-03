# 🔐 Module de Connexion

> Leeloo Dallas Multipass !

Un système complet de gestion d'utilisateurs avec inscription, connexion et administration.

## 📋 Description

Ce projet est un module de connexion sécurisé permettant aux utilisateurs de :
- ✅ Créer un compte
- ✅ Se connecter
- ✅ Modifier leurs informations personnelles
- ✅ Accéder à un panneau d'administration (pour les admins)

## 🚀 Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache/Nginx)
- PHPMyAdmin (recommandé)

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone https://github.com/geoffrey-carpentier/module-connexion.git
cd module-connexion
```

2. **Créer la base de données**
   - Ouvrir PHPMyAdmin
   - Importer le fichier `moduleconnexion.sql`
   - Ou exécuter les commandes SQL contenues dans le fichier

3. **Configurer la connexion à la base de données**
   - Ouvrir le fichier `db.php`
   - Modifier les paramètres de connexion si nécessaire :
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'moduleconnexion');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     ```

4. **Démarrer le serveur**
   - Placer les fichiers dans le répertoire web (htdocs, www, etc.)
   - Accéder à `http://localhost/module-connexion/`

## 📁 Structure du projet

```
module-connexion/
│
├── index.php              # Page d'accueil
├── inscription.php        # Formulaire d'inscription
├── connexion.php          # Formulaire de connexion
├── profil.php            # Page de profil utilisateur
├── admin.php             # Panneau d'administration
├── deconnexion.php       # Script de déconnexion
├── db.php                # Configuration base de données
├── style.css             # Feuille de styles
├── moduleconnexion.sql   # Structure de la base de données
└── README.md             # Documentation
```

## 🗄️ Base de données

### Table `utilisateurs`

| Champ | Type | Description |
|-------|------|-------------|
| id | INT | Clé primaire, auto-incrémenté |
| login | VARCHAR(255) | Identifiant unique |
| prenom | VARCHAR(255) | Prénom de l'utilisateur |
| nom | VARCHAR(255) | Nom de l'utilisateur |
| password | VARCHAR(255) | Mot de passe hashé |
| created_at | TIMESTAMP | Date de création du compte |

## 👤 Compte administrateur par défaut

- **Login:** admin
- **Mot de passe:** admin
- **Prénom:** admin
- **Nom:** admin

⚠️ **Important:** Changez le mot de passe admin après la première connexion !

## 🔒 Sécurité

Le projet implémente plusieurs mesures de sécurité :

- **Hashage des mots de passe** avec `password_hash()` (BCRYPT)
- **Protection contre les injections SQL** avec PDO et requêtes préparées
- **Validation des données** côté serveur
- **Sessions sécurisées** pour la gestion de l'authentification
- **Échappement des données** avec `htmlspecialchars()`
- **Vérification des permissions** pour la page admin

## 🎨 Fonctionnalités

### Pour tous les utilisateurs
- Inscription avec validation des données
- Connexion sécurisée
- Modification du profil
- Changement de mot de passe

### Pour les administrateurs
- Accès au panneau d'administration
- Vue d'ensemble de tous les utilisateurs
- Statistiques en temps réel
- Liste détaillée des comptes

## 🛠️ Technologies utilisées

- **Backend:** PHP 8.x
- **Base de données:** MySQL
- **Frontend:** HTML5, CSS3
- **Architecture:** PDO pour l'accès aux données
- **Sécurité:** password_hash, prepared statements

## 📝 Utilisation

1. **S'inscrire**
   - Aller sur `inscription.php`
   - Remplir le formulaire
   - Validation automatique et redirection vers la connexion

2. **Se connecter**
   - Aller sur `connexion.php`
   - Entrer login et mot de passe
   - Accès au profil après connexion réussie

3. **Modifier son profil**
   - Accéder à `profil.php` (nécessite d'être connecté)
   - Modifier les informations
   - Confirmer avec le mot de passe actuel

4. **Administration** (admin uniquement)
   - Accéder à `admin.php`
   - Consulter la liste des utilisateurs
   - Voir les statistiques

## 🐛 Débogage

Si vous rencontrez des problèmes :

1. Vérifier que la base de données est correctement créée
2. Vérifier les paramètres de connexion dans `db.php`
3. S'assurer que PHP 7.4+ est installé
4. Vérifier les permissions des fichiers
5. Consulter les logs d'erreur PHP

## 🤝 Contribution

Ce projet est un projet pédagogique. Les contributions sont les bienvenues !

## 📄 Licence

Projet pédagogique - Libre d'utilisation à des fins éducatives

## 👨‍💻 Auteur

Geoffrey Carpentier - [GitHub](https://github.com/geoffrey-carpentier)

## 🔗 Liens utiles

- [Documentation PHP](https://www.php.net/manual/fr/)
- [Tutoriel formulaires PHP](https://apprendre-php.com/tutoriels/tutoriel-12-traitement-des-formulaires-avec-get-et-post.html)
- [Sessions PHP](https://www.php.net/manual/fr/reserved.variables.session.php)
- [PDO PHP](https://www.php.net/manual/fr/book.pdo.php)

---

⭐ N'oubliez pas de mettre une étoile si ce projet vous a aidé !
