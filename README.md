# Module de Connexion PHP

**Note** : Ce projet a été réalisé dans le cadre de ma formation de Développeur Web et Web Mobile (DWWM) au sein de La Plateforme.

Ce dépôt contient un système d'authentification complet développé en PHP natif avec gestion des sessions et connexion sécurisée à une base de données MySQL.

## Fonctionnalités principales

- **Inscription / Connexion** : Formulaires sécurisés (hachage des mots de passe) pour la création et l'authentification d'utilisateurs.
- **Gestion de Profil** : Page permettant aux utilisateurs connectés de modifier leurs informations personnelles.
- **Espace Administrateur** : Interface réservée à l'administrateur (utilisateur `admin`) affichant la liste complète des utilisateurs enregistrés en base de données.
- **Sécurité** : Protection des pages (redirection automatique) par vérification des sessions PHP actives.

## Installation et utilisation

1. Clonez ce dépôt dans le répertoire de votre serveur web local (ex: `htdocs` pour MAMP/XAMPP, `www` pour WAMP).
   ```bash
   git clone https://github.com/geoffrey-carpentier/module-connexion.git
   ```
2. Importez le script SQL d'initialisation (`moduleconnexion.sql` ou fichier équivalent dans les sous-dossiers) dans votre SGBD (ex: phpMyAdmin) pour générer la structure de la base de données.
3. Ajustez les paramètres de connexion à votre base de données locale en modifiant les variables correspondantes dans le code (généralement dans `db.php` ou un fichier de configuration dédié).
4. Lancez votre serveur Apache/MySQL et accédez au projet via votre navigateur web.
