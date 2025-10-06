# Wireframe - Page de Connexion (connexion.php)

## Objectif
Page permettant aux utilisateurs existants de se connecter à leur compte.

## Desktop (1440px)

### Structure

```
┌─────────────────────────────────────────────────────────────┐
│                          HEADER                              │
│  Logo        Accueil | Connexion | Inscription              │
└─────────────────────────────────────────────────────────────┘
│                                                              │
│                                                              │
│              ┌─────────────────────────────┐                │
│              │                             │                │
│              │        CONNEXION            │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Email                 │ │                │
│              │  │ [________________]    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Mot de passe          │ │                │
│              │  │ [________________]    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ☑ Se souvenir de moi       │                │
│              │                             │                │
│              │  [    Se connecter     ]    │                │
│              │                             │                │
│              │  Mot de passe oublié ?      │                │
│              │                             │                │
│              │  ────────────────────────   │                │
│              │                             │                │
│              │  Pas encore de compte ?     │                │
│              │       [S'inscrire]          │                │
│              │                             │                │
│              └─────────────────────────────┘                │
│                                                              │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                          FOOTER                              │
│              © 2025 - Liens - Contact                        │
└─────────────────────────────────────────────────────────────┘
```

### Composants

#### Header
- Navigation identique à la page d'accueil
- "Connexion" actif dans la navigation

#### Formulaire de Connexion
- **Container** : Carte centrée avec shadow
- **Titre** : "Connexion"
- **Champs** :
  - Email (type: email, required)
  - Mot de passe (type: password, required, avec icône pour afficher/masquer)
- **Checkbox** : "Se souvenir de moi"
- **Bouton principal** : "Se connecter" (full width)
- **Lien secondaire** : "Mot de passe oublié ?" (petit, aligné à droite)
- **Divider** : Ligne horizontale
- **CTA inscription** : "Pas encore de compte ? S'inscrire"

#### États du formulaire
- **Validation en temps réel** :
  - Email invalide : Bordure rouge + message d'erreur
  - Champ vide : Bordure orange + message
  - Succès : Bordure verte
- **Messages d'erreur** :
  - "Veuillez entrer une adresse email valide"
  - "Ce champ est obligatoire"
  - "Email ou mot de passe incorrect"

---

## Mobile (375px)

### Structure

```
┌──────────────────────────┐
│        HEADER            │
│  Logo        [Menu ☰]   │
└──────────────────────────┘
│                          │
│  ┌────────────────────┐ │
│  │                    │ │
│  │    CONNEXION       │ │
│  │                    │ │
│  │ Email              │ │
│  │ [______________]   │ │
│  │                    │ │
│  │ Mot de passe       │ │
│  │ [______________]   │ │
│  │                    │ │
│  │ ☑ Se souvenir      │ │
│  │                    │ │
│  │ [  Se connecter ]  │ │
│  │                    │ │
│  │ Mot de passe       │ │
│  │    oublié ?        │ │
│  │                    │ │
│  │ ─────────────────  │ │
│  │                    │ │
│  │ Pas de compte ?    │ │
│  │   [S'inscrire]     │ │
│  │                    │ │
│  └────────────────────┘ │
│                          │
├──────────────────────────┤
│        FOOTER            │
└──────────────────────────┘
```

### Composants Mobile

#### Formulaire Mobile
- **Container** : Padding réduit, pleine largeur avec marges
- **Champs** : Pleine largeur, hauteur touch-friendly (min 44px)
- **Labels** : Au-dessus des champs
- **Bouton** : Pleine largeur, hauteur confortable (48px)
- **Liens** : Centrage, taille touch-friendly

---

## Interactions

### Desktop
- **Focus** : Bordure bleue sur les champs actifs
- **Hover** : Changement de couleur sur bouton et liens
- **Eye icon** : Toggle visibilité du mot de passe
- **Validation** : Messages apparaissent sous les champs

### Mobile
- **Touch** : Effet ripple sur bouton
- **Keyboard** : Apparaît automatiquement
- **Autocomplete** : Activé pour email/password
- **Type de clavier** : Email pour champ email

## États de la page

1. **État initial** : Formulaire vide
2. **État de saisie** : Utilisateur remplit le formulaire
3. **État d'erreur** : Identifiants incorrects
4. **État de chargement** : Spinner sur le bouton pendant la vérification
5. **État de succès** : Redirection vers profil.php

## Validation

### Règles
- **Email** : Format email valide
- **Mot de passe** : Non vide, min 6 caractères
- **Soumission** : Désactive le bouton pendant le traitement

### Messages d'erreur
- Affichés sous les champs concernés
- Couleur rouge (#dc3545)
- Icône d'erreur

### Messages de succès
- Toast notification en haut de la page
- Couleur verte (#28a745)
- "Connexion réussie ! Redirection..."

## Sécurité

- **CSRF Token** : Inclus dans le formulaire
- **SSL** : Formulaire en HTTPS uniquement
- **Rate limiting** : Limiter les tentatives de connexion
- **Password** : Type password, pas de révélation par défaut

## Accessibilité

- Labels associés aux champs (for/id)
- Messages d'erreur annoncés par screen readers (aria-live)
- Ordre de tabulation logique
- Focus visible
- Contraste suffisant pour les messages d'erreur
