# Wireframe - Page d'Administration (admin.php)

## Objectif
Page réservée aux administrateurs pour gérer les utilisateurs et le système.

## Desktop (1440px)

### Structure

```
┌─────────────────────────────────────────────────────────────┐
│                          HEADER                              │
│  Logo    Accueil | Admin | Profil          [Déconnexion]   │
└─────────────────────────────────────────────────────────────┘
│                                                              │
│  ┌────────────┐  ┌──────────────────────────────────────┐  │
│  │            │  │   TABLEAU DE BORD                     │  │
│  │  SIDEBAR   │  │                                       │  │
│  │            │  │  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐│  │
│  │ Dashboard  │  │  │ 👥   │ │ 📊   │ │ ⚙️   │ │ 🔒   ││  │
│  │ Users      │  │  │Users │ │Posts │ │Conf  │ │Sec   ││  │
│  │ Settings   │  │  │ 125  │ │ 450  │ │ OK   │ │ OK   ││  │
│  │ Logs       │  │  └──────┘ └──────┘ └──────┘ └──────┘│  │
│  │            │  │                                       │  │
│  │            │  │  GESTION DES UTILISATEURS            │  │
│  │            │  │                                       │  │
│  │            │  │  [Recherche...] [+Nouvel utilisateur]│  │
│  │            │  │                                       │  │
│  │            │  │  ┌────────────────────────────────┐  │  │
│  │            │  │  │ID│Nom│Email│Rôle│Actions      │  │  │
│  │            │  │  ├──┼───┼─────┼────┼─────────────┤  │  │
│  │            │  │  │1 │Bob│b@.. │User│[👁][✏️][🗑]│  │  │
│  │            │  │  │2 │Ali│a@.. │Adm │[👁][✏️][🗑]│  │  │
│  │            │  │  │3 │Cla│c@.. │User│[👁][✏️][🗑]│  │  │
│  │            │  │  └────────────────────────────────┘  │  │
│  │            │  │                                       │  │
│  │            │  │  [< Précédent]  Page 1/5  [Suivant >]│  │
│  │            │  │                                       │  │
│  └────────────┘  └──────────────────────────────────────┘  │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                          FOOTER                              │
│              © 2025 - Liens - Contact                        │
└─────────────────────────────────────────────────────────────┘
```

### Composants

#### Header Admin
- **Logo/Titre** : Module Connexion
- **Navigation** :
  - Accueil
  - Admin (actif)
  - Profil
- **Bouton déconnexion** : À droite, rouge
- **Indicateur de rôle** : Badge "Administrateur"

#### Sidebar (Navigation secondaire)
- **Menu vertical** :
  - 📊 Dashboard (actif)
  - 👥 Utilisateurs
  - ⚙️ Paramètres
  - 📋 Logs
  - 🔒 Sécurité
- **Position** : Fixed à gauche
- **Largeur** : 200px

#### Zone principale - Dashboard

##### Cartes de statistiques (4 cartes en ligne)
1. **Utilisateurs**
   - Icône : 👥
   - Nombre : 125
   - Label : "Utilisateurs"
   
2. **Publications/Sessions**
   - Icône : 📊
   - Nombre : 450
   - Label : "Sessions actives"
   
3. **Configuration**
   - Icône : ⚙️
   - Statut : OK
   - Label : "Système"
   
4. **Sécurité**
   - Icône : 🔒
   - Statut : OK
   - Label : "Sécurité"

##### Gestion des utilisateurs

**Barre d'actions**
- Champ de recherche : "Rechercher un utilisateur..."
- Bouton : "+ Nouvel utilisateur"
- Filtres : Par rôle (dropdown)

**Tableau des utilisateurs**
- **Colonnes** :
  - ID
  - Nom
  - Email
  - Rôle (User/Admin)
  - Statut (Actif/Inactif)
  - Date d'inscription
  - Actions
- **Actions par ligne** :
  - 👁️ Voir (modal de détails)
  - ✏️ Modifier (modal d'édition)
  - 🗑️ Supprimer (confirmation)
- **Tri** : Cliquable sur les en-têtes
- **Pagination** : En bas du tableau

---

## Mobile (375px)

### Structure

```
┌──────────────────────────┐
│        HEADER            │
│  Logo   [Menu ☰] [🚪]   │
└──────────────────────────┘
│                          │
│  ┌──────────────────┐   │
│  │   DASHBOARD      │   │
│  │                  │   │
│  │  ┌─────┐ ┌─────┐│   │
│  │  │👥   │ │📊   ││   │
│  │  │125  │ │450  ││   │
│  │  └─────┘ └─────┘│   │
│  │                  │   │
│  │  ┌─────┐ ┌─────┐│   │
│  │  │⚙️   │ │🔒   ││   │
│  │  │OK   │ │OK   ││   │
│  │  └─────┘ └─────┘│   │
│  └──────────────────┘   │
│                          │
│  UTILISATEURS            │
│  [Recherche...]          │
│                          │
│  ┌──────────────────┐   │
│  │ Bob (b@mail)     │   │
│  │ Rôle: User       │   │
│  │ [👁] [✏️] [🗑]    │   │
│  └──────────────────┘   │
│                          │
│  ┌──────────────────┐   │
│  │ Alice (a@mail)   │   │
│  │ Rôle: Admin      │   │
│  │ [👁] [✏️] [🗑]    │   │
│  └──────────────────┘   │
│                          │
│  [< Préc] 1/5 [Suiv >]  │
│                          │
│  [+ Nouvel utilisateur]  │
│                          │
├──────────────────────────┤
│        FOOTER            │
└──────────────────────────┘
```

### Composants Mobile

#### Menu mobile
- **Hamburger** : Ouvre le menu latéral
- **Bouton déconnexion** : Icône 🚪 en haut à droite

#### Cartes statistiques
- **Grid 2x2** : 2 colonnes sur mobile
- **Taille réduite** : Version compacte

#### Liste des utilisateurs
- **Cartes** : Au lieu du tableau
- **Swipe actions** : Swipe pour révéler actions
- **Recherche** : Sticky en haut de la liste

---

## Fonctionnalités détaillées

### 1. Voir un utilisateur (Modal)

```
┌────────────────────────────────┐
│  Détails de l'utilisateur   [X]│
├────────────────────────────────┤
│                                │
│  Nom complet: Bob Martin       │
│  Email: bob.martin@mail.com    │
│  Rôle: Utilisateur             │
│  Statut: Actif                 │
│  Inscrit le: 15/01/2025        │
│  Dernière connexion: 05/02/2025│
│                                │
│  [Modifier] [Fermer]           │
└────────────────────────────────┘
```

### 2. Modifier un utilisateur (Modal)

```
┌────────────────────────────────┐
│  Modifier l'utilisateur     [X]│
├────────────────────────────────┤
│                                │
│  Nom: [________________]       │
│  Email: [_______________]      │
│  Rôle: [User ▼]                │
│  Statut: [Actif ▼]             │
│                                │
│  ☑ Réinitialiser le mot de     │
│    passe (envoi email)         │
│                                │
│  [Annuler] [Enregistrer]       │
└────────────────────────────────┘
```

### 3. Supprimer un utilisateur (Confirmation)

```
┌────────────────────────────────┐
│  ⚠️ Confirmation               │
├────────────────────────────────┤
│                                │
│  Voulez-vous vraiment          │
│  supprimer cet utilisateur ?   │
│                                │
│  Bob Martin (bob@mail.com)     │
│                                │
│  Cette action est irréversible.│
│                                │
│  [Annuler] [Supprimer]         │
└────────────────────────────────┘
```

### 4. Nouvel utilisateur (Modal)

```
┌────────────────────────────────┐
│  Nouvel utilisateur         [X]│
├────────────────────────────────┤
│                                │
│  Nom: [________________]       │
│  Prénom: [_____________]       │
│  Email: [_______________]      │
│  Rôle: [User ▼]                │
│                                │
│  ☑ Envoyer email d'invitation  │
│                                │
│  [Annuler] [Créer]             │
└────────────────────────────────┘
```

## Interactions

### Desktop
- **Hover sur ligne tableau** : Background gris clair
- **Tri colonnes** : Clic sur en-tête, icône ↑↓
- **Actions** : Boutons avec tooltips
- **Modals** : Overlay avec animation fade-in

### Mobile
- **Swipe** : Sur carte pour révéler actions
- **Long press** : Sélection multiple
- **Pull to refresh** : Actualiser la liste

## États

1. **Chargement** : Skeleton loader pour le tableau
2. **Vide** : "Aucun utilisateur trouvé"
3. **Erreur** : Message d'erreur avec bouton retry
4. **Succès** : Toast notification après action

## Permissions

- **Accès page** : Réservé aux administrateurs
- **Redirection** : Si non-admin → profil.php
- **Actions** :
  - Voir : Admin + User (son propre profil)
  - Modifier : Admin uniquement
  - Supprimer : Admin uniquement (sauf lui-même)

## Logs d'activité

Toutes les actions admin sont enregistrées :
- Qui a fait l'action
- Quelle action
- Sur quel utilisateur
- Quand
- Adresse IP

## Accessibilité

- Tableaux avec en-têtes appropriés
- Boutons d'action avec labels
- Messages d'état annoncés
- Navigation au clavier complète
- Modals avec focus trap
