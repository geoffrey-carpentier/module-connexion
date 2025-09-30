# Test Manual - Module Connexion

## Liste de vérification des fonctionnalités

### Configuration et Installation
- [ ] Base de données créée avec succès
- [ ] Table Users créée correctement
- [ ] Compte admin par défaut créé
- [ ] Configuration de connexion PDO fonctionne

### Page index.php (Accueil)
- [ ] Affichage correct de la page d'accueil
- [ ] Navigation fonctionnelle
- [ ] Boutons "Connexion" et "Inscription" visibles pour utilisateurs non connectés
- [ ] Menu différent pour utilisateurs connectés
- [ ] Affichage du nom d'utilisateur quand connecté
- [ ] Badge "Administrateur" visible pour les admins

### Page signup.php (Inscription)
- [ ] Formulaire d'inscription affiché
- [ ] Validation côté serveur fonctionnelle
- [ ] Vérification de nom d'utilisateur dupliqué
- [ ] Vérification d'email dupliqué
- [ ] Vérification de correspondance des mots de passe
- [ ] Validation de la longueur du nom d'utilisateur (3-50 caractères)
- [ ] Validation de l'email (format valide)
- [ ] Validation de la longueur du mot de passe (minimum 6 caractères)
- [ ] Hashage du mot de passe avec bcrypt
- [ ] Redirection vers signin.php après inscription réussie
- [ ] Messages d'erreur appropriés

### Page signin.php (Connexion)
- [ ] Formulaire de connexion affiché
- [ ] Connexion avec nom d'utilisateur fonctionne
- [ ] Connexion avec email fonctionne
- [ ] Vérification du mot de passe avec password_verify()
- [ ] Création de session après connexion réussie
- [ ] Redirection vers index.php après connexion
- [ ] Messages d'erreur pour identifiants incorrects
- [ ] Redirection automatique si déjà connecté

### Page profil.php (Profil Utilisateur)
- [ ] Redirection vers signin.php si non connecté
- [ ] Affichage des informations utilisateur
- [ ] Formulaire de modification prérempli
- [ ] Modification du nom d'utilisateur fonctionne
- [ ] Modification de l'email fonctionne
- [ ] Changement de mot de passe optionnel
- [ ] Vérification du mot de passe actuel avant changement
- [ ] Validation des nouvelles données
- [ ] Messages de succès/erreur appropriés
- [ ] Affichage du statut admin si applicable

### Page admin.php (Administration)
- [ ] Redirection vers index.php si non admin
- [ ] Affichage de la table complète des utilisateurs
- [ ] Colonne ID affichée
- [ ] Colonne Nom d'utilisateur affichée
- [ ] Colonne Email affichée
- [ ] Colonne Statut (Admin/User) affichée
- [ ] Colonne Date d'inscription affichée
- [ ] Bouton "Toggle Admin" fonctionnel
- [ ] Bouton "Supprimer" fonctionnel
- [ ] Impossible de supprimer son propre compte
- [ ] Impossible de modifier ses propres privilèges
- [ ] Confirmation avant suppression
- [ ] Statistiques (total utilisateurs, admins) affichées

### Page logout.php (Déconnexion)
- [ ] Destruction complète de la session
- [ ] Suppression du cookie de session
- [ ] Redirection vers index.php
- [ ] Impossible d'accéder aux pages protégées après déconnexion

### Sécurité
- [ ] Tokens CSRF générés et vérifiés
- [ ] Mots de passe hashés avec password_hash()
- [ ] Requêtes préparées PDO (protection SQL injection)
- [ ] Échappement HTML avec htmlspecialchars()
- [ ] Sessions régénérées après connexion
- [ ] Validation des données côté serveur
- [ ] Vérification des permissions admin

### CSS et Design
- [ ] Design responsive
- [ ] Gradient de fond affiché
- [ ] Cartes centrées et stylisées
- [ ] Navigation fonctionnelle et stylisée
- [ ] Formulaires bien formatés
- [ ] Boutons avec effets hover
- [ ] Messages d'erreur/succès bien visibles
- [ ] Table admin responsive
- [ ] Badges colorés pour statuts

### Flux utilisateur complet
1. [ ] Inscription d'un nouvel utilisateur
2. [ ] Connexion avec le compte créé
3. [ ] Accès à la page profil
4. [ ] Modification des informations de profil
5. [ ] Changement de mot de passe
6. [ ] Déconnexion
7. [ ] Reconnexion

### Flux administrateur
1. [ ] Connexion avec compte admin
2. [ ] Accès au panel admin
3. [ ] Visualisation de tous les utilisateurs
4. [ ] Promotion d'un utilisateur en admin
5. [ ] Rétrogradation d'un admin en utilisateur
6. [ ] Suppression d'un utilisateur
7. [ ] Vérification des statistiques

## Notes de test

### Compte admin par défaut
- Username: admin
- Email: admin@example.com
- Password: admin123

### Scénarios de test recommandés

#### Test 1: Inscription normale
1. Aller sur signup.php
2. Remplir tous les champs avec des données valides
3. Vérifier la création du compte
4. Vérifier la redirection vers signin.php

#### Test 2: Validation formulaire inscription
1. Tenter inscription avec mots de passe différents
2. Tenter inscription avec email invalide
3. Tenter inscription avec nom d'utilisateur trop court
4. Tenter inscription avec compte déjà existant

#### Test 3: Connexion et session
1. Se connecter avec identifiants valides
2. Vérifier la session active
3. Naviguer entre les pages
4. Vérifier que la session persiste
5. Se déconnecter
6. Vérifier que l'accès aux pages protégées est bloqué

#### Test 4: Gestion de profil
1. Se connecter
2. Modifier nom d'utilisateur
3. Modifier email
4. Changer mot de passe
5. Se déconnecter
6. Reconnexion avec nouveau mot de passe

#### Test 5: Panel admin
1. Se connecter en tant qu'admin
2. Créer un nouveau compte utilisateur
3. Le promouvoir en admin
4. Se déconnecter
5. Se connecter avec le nouveau compte admin
6. Vérifier l'accès au panel admin

#### Test 6: Sécurité
1. Tenter d'accéder à profil.php sans connexion
2. Tenter d'accéder à admin.php sans être admin
3. Vérifier les tokens CSRF dans les formulaires
4. Vérifier que les mots de passe ne sont pas en clair en BDD

## Résultats attendus

Toutes les cases doivent être cochées pour que le module soit considéré comme fonctionnel.
