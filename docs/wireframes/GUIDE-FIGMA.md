# Guide pour créer les wireframes dans Figma

Ce document explique comment créer les wireframes du module de connexion dans Figma en se basant sur les spécifications fournies.

## Étape 1 : Préparation dans Figma

### 1.1 Créer un nouveau projet Figma
1. Connectez-vous à [Figma](https://www.figma.com/)
2. Créez un nouveau fichier : "Module Connexion - Wireframes"
3. Créez 2 pages dans le fichier :
   - "Desktop Wireframes"
   - "Mobile Wireframes"

### 1.2 Configurer les frames (artboards)

**Pour Desktop :**
- Frame size : 1440 x 1024 px
- Créez 5 frames pour les 5 pages :
  - `Desktop - Accueil`
  - `Desktop - Connexion`
  - `Desktop - Inscription`
  - `Desktop - Admin`
  - `Desktop - Profil`

**Pour Mobile :**
- Frame size : 375 x 812 px (iPhone X)
- Créez 5 frames pour les 5 pages :
  - `Mobile - Accueil`
  - `Mobile - Connexion`
  - `Mobile - Inscription`
  - `Mobile - Admin`
  - `Mobile - Profil`

## Étape 2 : Créer les composants réutilisables

### 2.1 Header (Desktop)
- Hauteur : 64px
- Background : Blanc (#FFFFFF)
- Border-bottom : 1px solid #E0E0E0
- Éléments :
  - Logo/Titre (gauche)
  - Navigation (centre) : Liens texte
  - Bouton déconnexion (droite) si connecté

### 2.2 Header (Mobile)
- Hauteur : 56px
- Logo (gauche)
- Menu hamburger (droite) : Icône ☰

### 2.3 Footer
- Hauteur : 80px
- Background : #F8F9FA
- Texte centré
- Liens en ligne

### 2.4 Boutons

**Bouton primaire :**
- Height : 44px (desktop), 48px (mobile)
- Padding : 12px 24px
- Background : #007bff
- Text color : #FFFFFF
- Border-radius : 4px
- Font-size : 16px

**Bouton secondaire :**
- Height : 44px (desktop), 48px (mobile)
- Padding : 12px 24px
- Background : transparent
- Border : 1px solid #007bff
- Text color : #007bff
- Border-radius : 4px
- Font-size : 16px

### 2.5 Champs de formulaire

**Input field :**
- Height : 44px (desktop), 48px (mobile)
- Padding : 12px 16px
- Border : 1px solid #CED4DA
- Border-radius : 4px
- Font-size : 16px
- Label au-dessus : Font-size 14px, color #495057

**États :**
- Normal : Border #CED4DA
- Focus : Border #007bff, Shadow 0 0 0 3px rgba(0,123,255,0.25)
- Erreur : Border #dc3545
- Succès : Border #28a745

### 2.6 Cartes

**Card :**
- Background : #FFFFFF
- Border : 1px solid #E0E0E0
- Border-radius : 8px
- Padding : 24px
- Shadow : 0 2px 4px rgba(0,0,0,0.1)

## Étape 3 : Créer les wireframes

### 3.1 Page Accueil

**Desktop :**
1. Insérez le composant Header
2. Créez la section Hero :
   - Height : 400px
   - Background : Gradient ou couleur claire
   - Titre H1 (32px) centré
   - Sous-titre (18px) centré
   - 2 boutons (Connexion, S'inscrire) côte à côte
3. Créez la section Fonctionnalités :
   - 3 cartes en ligne
   - Icône + Titre + Description
   - Espacement : 24px entre les cartes
4. Insérez le composant Footer

**Mobile :**
1. Insérez le composant Header mobile
2. Section Hero plus compacte (height: 300px)
3. Boutons empilés verticalement
4. Cartes fonctionnalités empilées verticalement
5. Footer

Référence : `/docs/wireframes/01-accueil.md`

### 3.2 Page Connexion

**Desktop :**
1. Insérez le composant Header
2. Créez le formulaire de connexion centré :
   - Card (max-width: 400px)
   - Titre "Connexion"
   - Input Email
   - Input Mot de passe (avec icône œil)
   - Checkbox "Se souvenir"
   - Bouton "Se connecter"
   - Lien "Mot de passe oublié ?"
   - Divider
   - Lien "S'inscrire"
3. Insérez le composant Footer

**Mobile :**
- Formulaire en pleine largeur avec marges (16px)
- Hauteur des inputs : 48px

Référence : `/docs/wireframes/02-connexion.md`

### 3.3 Page Inscription

**Desktop :**
1. Insérez le composant Header
2. Créez le formulaire d'inscription centré :
   - Card (max-width: 400px)
   - Titre "Inscription"
   - Input Nom
   - Input Prénom
   - Input Email
   - Input Mot de passe (avec indicateur de force)
   - Input Confirmation mot de passe
   - Checkbox CGU
   - Bouton "S'inscrire"
   - Divider
   - Lien "Se connecter"
3. Insérez le composant Footer

**Mobile :**
- Formulaire en pleine largeur avec marges

Référence : `/docs/wireframes/03-inscription.md`

### 3.4 Page Admin

**Desktop :**
1. Insérez le composant Header (avec bouton déconnexion)
2. Créez la sidebar (200px de large) :
   - Menu vertical avec icônes
   - Items : Dashboard, Users, Settings, Logs
3. Zone principale :
   - 4 cartes statistiques en ligne
   - Tableau des utilisateurs
   - Barre de recherche + bouton "Nouvel utilisateur"
   - Pagination
4. Insérez le composant Footer

**Mobile :**
- Menu hamburger pour la sidebar
- Cartes statistiques en grid 2x2
- Liste de cartes au lieu du tableau
- Swipe actions

Référence : `/docs/wireframes/04-admin.md`

### 3.5 Page Profil

**Desktop :**
1. Insérez le composant Header
2. Layout 2 colonnes :
   - Colonne gauche (300px) : Carte profil avec photo
   - Colonne droite : Sections empilées
     - Informations personnelles
     - Sécurité et mot de passe
     - Préférences
     - Actions
3. Insérez le composant Footer

**Mobile :**
- Sections empilées verticalement
- Photo de profil en haut

Référence : `/docs/wireframes/05-profil.md`

## Étape 4 : Ajouter les annotations

Sur chaque wireframe, ajoutez des annotations pour :
- Les interactions (hover, click, etc.)
- Les états (normal, erreur, succès)
- Les animations
- Les redirections

## Étape 5 : Créer le prototype

1. Passez en mode Prototype dans Figma
2. Liez les écrans entre eux :
   - Boutons de navigation → Pages correspondantes
   - Bouton "Connexion" → Page profil (simulation)
   - Bouton "S'inscrire" → Page profil (simulation)
3. Ajoutez des animations :
   - Transition : Instant, Smart Animate, ou Dissolve
   - Duration : 300ms

## Étape 6 : Créer les maquettes (mockups)

Une fois les wireframes validés, créez les maquettes haute-fidélité :

### 6.1 Appliquer la palette de couleurs
```
Primaire : #007bff
Secondaire : #6c757d
Succès : #28a745
Danger : #dc3545
Fond : #f8f9fa
Texte : #212529
```

### 6.2 Appliquer la typographie
- Police : Inter ou Roboto
- Taille de base : 16px
- Line-height : 1.5

### 6.3 Ajouter les images
- Placeholders pour photos de profil
- Icônes (utiliser Feather Icons ou Material Icons)
- Illustrations pour la page d'accueil

### 6.4 Améliorer le design
- Shadows plus prononcées
- Gradients subtils
- Micro-interactions
- États hover détaillés

## Étape 7 : Partager et collaborer

1. Créez un lien de partage Figma
2. Ajoutez des commentaires pour les points à valider
3. Exportez les wireframes en PDF ou PNG si nécessaire

## Ressources utiles

### Templates Figma Community
- [Wireframe Kit](https://www.figma.com/community/file/809850655919849654)
- [Web UI Kit](https://www.figma.com/community/file/810441357963111628)
- [Form Elements](https://www.figma.com/community/file/809839705831270706)

### Plugins Figma recommandés
- **Iconify** : Pour insérer des icônes
- **Lorem Ipsum** : Pour générer du texte
- **Unsplash** : Pour les images placeholder
- **Content Reel** : Pour générer du contenu réaliste
- **Contrast** : Pour vérifier le contraste des couleurs

### Design Systems
- [Material Design](https://material.io/design)
- [Bootstrap](https://getbootstrap.com/)
- [Ant Design](https://ant.design/)

## Checklist finale

- [ ] Les 5 wireframes desktop sont créés
- [ ] Les 5 wireframes mobile sont créés
- [ ] Les composants réutilisables sont créés
- [ ] Les annotations sont ajoutées
- [ ] Le prototype est fonctionnel
- [ ] Les liens de navigation fonctionnent
- [ ] Les maquettes haute-fidélité sont créées (optionnel)
- [ ] Le fichier est partagé avec l'équipe
- [ ] Les commentaires sont ajoutés pour les points à valider

## Contact et support

Pour toute question sur les spécifications, consultez :
- Les fichiers markdown dans `/docs/wireframes/`
- La documentation du projet dans `/README.md`
