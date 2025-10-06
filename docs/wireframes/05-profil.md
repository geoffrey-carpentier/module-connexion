# Wireframe - Page de Profil (profil.php)

## Objectif
Page permettant à l'utilisateur connecté de consulter et modifier ses informations personnelles.

## Desktop (1440px)

### Structure

```
┌─────────────────────────────────────────────────────────────┐
│                          HEADER                              │
│  Logo    Accueil | Profil | (Admin)          [Déconnexion] │
└─────────────────────────────────────────────────────────────┘
│                                                              │
│  ┌────────────────────────────────────────────────────────┐ │
│  │                    MON PROFIL                          │ │
│  └────────────────────────────────────────────────────────┘ │
│                                                              │
│  ┌──────────────────┐  ┌────────────────────────────────┐  │
│  │                  │  │  INFORMATIONS PERSONNELLES     │  │
│  │      [📷]        │  │                                │  │
│  │                  │  │  Nom: [_______________]        │  │
│  │   Photo de       │  │                                │  │
│  │    profil        │  │  Prénom: [___________]         │  │
│  │                  │  │                                │  │
│  │  [Changer]       │  │  Email: [___________]          │  │
│  │                  │  │                                │  │
│  │                  │  │  Rôle: Utilisateur             │  │
│  │  Bob Martin      │  │                                │  │
│  │  Utilisateur     │  │  Membre depuis: 15/01/2025     │  │
│  │                  │  │                                │  │
│  │                  │  │  [Modifier]  [Annuler]         │  │
│  └──────────────────┘  └────────────────────────────────┘  │
│                                                              │
│  ┌────────────────────────────────────────────────────────┐ │
│  │           SÉCURITÉ ET MOT DE PASSE                     │ │
│  │                                                        │ │
│  │  Mot de passe actuel: [_______________]               │ │
│  │                                                        │ │
│  │  Nouveau mot de passe: [_______________] 👁            │ │
│  │  Force: ████████░░ Fort                               │ │
│  │                                                        │ │
│  │  Confirmer nouveau mot de passe: [_______________] 👁  │ │
│  │                                                        │ │
│  │  [Changer le mot de passe]                            │ │
│  └────────────────────────────────────────────────────────┘ │
│                                                              │
│  ┌────────────────────────────────────────────────────────┐ │
│  │           PRÉFÉRENCES                                  │ │
│  │                                                        │ │
│  │  ☑ Recevoir des notifications par email              │ │
│  │  ☑ Activer l'authentification à deux facteurs        │ │
│  │  ☐ Rendre mon profil public                          │ │
│  │                                                        │ │
│  │  [Enregistrer les préférences]                        │ │
│  └────────────────────────────────────────────────────────┘ │
│                                                              │
│  ┌────────────────────────────────────────────────────────┐ │
│  │           ACTIONS                                      │ │
│  │                                                        │ │
│  │  [📥 Télécharger mes données]                         │ │
│  │  [🗑️ Supprimer mon compte]                           │ │
│  └────────────────────────────────────────────────────────┘ │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                          FOOTER                              │
│              © 2025 - Liens - Contact                        │
└─────────────────────────────────────────────────────────────┘
```

### Composants

#### Header Profil
- **Navigation** :
  - Accueil
  - Profil (actif)
  - Admin (si l'utilisateur est admin)
- **Bouton déconnexion** : À droite

#### Section 1 : Carte de profil (sidebar gauche)
- **Photo de profil** :
  - Avatar circulaire (150x150px)
  - Placeholder si pas de photo
  - Bouton "Changer" pour upload
- **Nom complet** : Affiché sous la photo
- **Rôle** : Badge (User/Admin)

#### Section 2 : Informations personnelles
- **Champs éditables** :
  - Nom (required)
  - Prénom (required)
  - Email (required, avec validation)
- **Champs non éditables** :
  - Rôle (affiché mais non modifiable)
  - Date d'inscription
- **Boutons** :
  - "Modifier" : Active l'édition
  - "Annuler" : Annule les modifications
  - "Enregistrer" : Sauvegarde les changements

#### Section 3 : Sécurité et mot de passe
- **Champs** :
  - Mot de passe actuel (required pour validation)
  - Nouveau mot de passe (avec indicateur de force)
  - Confirmation nouveau mot de passe
- **Indicateur de force** : Barre visuelle
- **Bouton** : "Changer le mot de passe"

#### Section 4 : Préférences
- **Checkboxes** :
  - Notifications email
  - Authentification à deux facteurs
  - Profil public
- **Bouton** : "Enregistrer les préférences"

#### Section 5 : Actions dangereuses
- **Télécharger données** : Export GDPR
- **Supprimer compte** : Avec confirmation

---

## Mobile (375px)

### Structure

```
┌──────────────────────────┐
│        HEADER            │
│  Logo   [Menu ☰] [🚪]   │
└──────────────────────────┘
│                          │
│     MON PROFIL           │
│                          │
│  ┌────────────────────┐ │
│  │                    │ │
│  │      [📷]          │ │
│  │  Photo de profil   │ │
│  │                    │ │
│  │   [Changer]        │ │
│  │                    │ │
│  │   Bob Martin       │ │
│  │   Utilisateur      │ │
│  └────────────────────┘ │
│                          │
│  INFORMATIONS            │
│                          │
│  Nom:                    │
│  [__________________]    │
│                          │
│  Prénom:                 │
│  [__________________]    │
│                          │
│  Email:                  │
│  [__________________]    │
│                          │
│  Rôle: Utilisateur       │
│  Membre depuis:          │
│  15/01/2025              │
│                          │
│  [Modifier] [Annuler]    │
│                          │
│  ────────────────────    │
│                          │
│  SÉCURITÉ                │
│                          │
│  Mot de passe actuel:    │
│  [__________________]    │
│                          │
│  Nouveau mot de passe:   │
│  [__________________] 👁  │
│  Force: ████████░░       │
│                          │
│  Confirmer:              │
│  [__________________] 👁  │
│                          │
│  [Changer mot de passe]  │
│                          │
│  ────────────────────    │
│                          │
│  PRÉFÉRENCES             │
│                          │
│  ☑ Notifications email   │
│  ☑ Auth. 2 facteurs      │
│  ☐ Profil public         │
│                          │
│  [Enregistrer]           │
│                          │
│  ────────────────────    │
│                          │
│  ACTIONS                 │
│                          │
│  [📥 Télécharger données]│
│  [🗑️ Supprimer compte]  │
│                          │
├──────────────────────────┤
│        FOOTER            │
└──────────────────────────┘
```

---

## Fonctionnalités détaillées

### 1. Changer la photo de profil

**Modal d'upload**
```
┌────────────────────────────────┐
│  Changer la photo           [X]│
├────────────────────────────────┤
│                                │
│  [Choisir un fichier]          │
│  ou glisser-déposer            │
│                                │
│  ┌──────────────────────────┐ │
│  │                          │ │
│  │      Aperçu              │ │
│  │                          │ │
│  └──────────────────────────┘ │
│                                │
│  Formats acceptés: JPG, PNG    │
│  Taille max: 2 MB              │
│                                │
│  [Annuler] [Upload]            │
└────────────────────────────────┘
```

### 2. Modifier les informations

**États** :
- **Vue** : Champs en lecture seule avec bouton "Modifier"
- **Édition** : Champs éditables avec boutons "Enregistrer" et "Annuler"
- **Sauvegarde** : Spinner + désactivation des boutons
- **Succès** : Toast "Informations mises à jour"

### 3. Changer le mot de passe

**Processus** :
1. Saisie du mot de passe actuel (validation)
2. Saisie du nouveau mot de passe (avec indicateur de force)
3. Confirmation du nouveau mot de passe
4. Clic sur "Changer le mot de passe"
5. Validation côté serveur
6. Success : Toast + déconnexion automatique
7. Reconnexion avec nouveau mot de passe

### 4. Supprimer le compte

**Modal de confirmation**
```
┌────────────────────────────────┐
│  ⚠️ Supprimer mon compte    [X]│
├────────────────────────────────┤
│                                │
│  Êtes-vous sûr de vouloir      │
│  supprimer votre compte ?      │
│                                │
│  Cette action est définitive   │
│  et irréversible.              │
│                                │
│  Toutes vos données seront     │
│  supprimées.                   │
│                                │
│  Pour confirmer, tapez:        │
│  SUPPRIMER                     │
│                                │
│  [_________________]           │
│                                │
│  [Annuler] [Supprimer]         │
└────────────────────────────────┘
```

### 5. Télécharger les données (GDPR)

**Processus** :
1. Clic sur "Télécharger mes données"
2. Modal : "Préparation de vos données..."
3. Génération fichier JSON/ZIP
4. Téléchargement automatique
5. Success : Toast "Données téléchargées"

---

## Validation

### Informations personnelles
- **Nom/Prénom** : 2-50 caractères, lettres uniquement
- **Email** : Format valide, unique dans la base

### Mot de passe
- **Actuel** : Vérification contre la base
- **Nouveau** : Min 8 caractères, critères de force
- **Confirmation** : Doit correspondre au nouveau

### Photo de profil
- **Format** : JPG, PNG, GIF
- **Taille** : Max 2 MB
- **Dimensions** : Redimensionnement automatique à 300x300px

---

## Messages

### Succès
- "Profil mis à jour avec succès"
- "Photo de profil changée"
- "Mot de passe modifié"
- "Préférences enregistrées"
- "Données téléchargées"

### Erreurs
- "Le mot de passe actuel est incorrect"
- "Les mots de passe ne correspondent pas"
- "L'email est déjà utilisé"
- "Fichier trop volumineux"
- "Format de fichier non supporté"

---

## Interactions

### Desktop
- **Hover** : Effet sur boutons
- **Focus** : Bordure bleue sur champs
- **Drag & drop** : Pour photo de profil
- **Tooltip** : Sur les icônes d'information

### Mobile
- **Touch** : Zones suffisamment grandes
- **Scroll** : Sections défilables
- **Camera** : Option de prendre photo directement

---

## Sécurité

- **Authentification requise** : Redirection si non connecté
- **CSRF protection** : Sur tous les formulaires
- **Validation côté serveur** : Toujours
- **Re-authentification** : Pour actions sensibles (changement email, mot de passe, suppression)

---

## Accessibilité

- Labels sur tous les champs
- Messages d'erreur annoncés
- Ordre de tabulation logique
- Contraste suffisant
- Focus visible
- Alternative texte pour photo de profil
