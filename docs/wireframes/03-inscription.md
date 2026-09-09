# Wireframe - Page d'Inscription (inscription.php)

## Objectif
Page permettant aux nouveaux utilisateurs de créer un compte.

## Desktop (1440px)

### Structure

```
┌─────────────────────────────────────────────────────────────┐
│                          HEADER                              │
│  Logo        Accueil | Connexion | Inscription              │
└─────────────────────────────────────────────────────────────┘
│                                                              │
│              ┌─────────────────────────────┐                │
│              │                             │                │
│              │       INSCRIPTION           │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Nom                   │ │                │
│              │  │ [________________]    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Prénom                │ │                │
│              │  │ [________________]    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Email                 │ │                │
│              │  │ [________________]    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Mot de passe          │ │                │
│              │  │ [________________] 👁  │ │                │
│              │  │ Force: ████░░░░░░░    │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ┌───────────────────────┐ │                │
│              │  │ Confirmer mot de passe│ │                │
│              │  │ [________________] 👁  │ │                │
│              │  └───────────────────────┘ │                │
│              │                             │                │
│              │  ☑ J'accepte les CGU        │                │
│              │                             │                │
│              │  [    S'inscrire      ]     │                │
│              │                             │                │
│              │  ────────────────────────   │                │
│              │                             │                │
│              │  Déjà un compte ?           │                │
│              │       [Se connecter]        │                │
│              │                             │                │
│              └─────────────────────────────┘                │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                          FOOTER                              │
│              © 2025 - Liens - Contact                        │
└─────────────────────────────────────────────────────────────┘
```

### Composants

#### Header
- Navigation identique aux autres pages
- "Inscription" actif dans la navigation

#### Formulaire d'Inscription
- **Container** : Carte centrée avec shadow
- **Titre** : "Inscription"
- **Champs** :
  1. Nom (type: text, required)
  2. Prénom (type: text, required)
  3. Email (type: email, required)
  4. Mot de passe (type: password, required, avec icône show/hide)
  5. Confirmer mot de passe (type: password, required)
- **Indicateur de force** : Barre de progression pour le mot de passe
  - Faible (rouge) : < 6 caractères
  - Moyen (orange) : 6-8 caractères, sans critères spéciaux
  - Fort (vert) : > 8 caractères + majuscules + chiffres + caractères spéciaux
- **Checkbox** : "J'accepte les conditions générales d'utilisation"
- **Bouton principal** : "S'inscrire" (full width, désactivé tant que CGU non acceptées)
- **Divider** : Ligne horizontale
- **CTA connexion** : "Déjà un compte ? Se connecter"

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
│  │   INSCRIPTION      │ │
│  │                    │ │
│  │ Nom                │ │
│  │ [______________]   │ │
│  │                    │ │
│  │ Prénom             │ │
│  │ [______________]   │ │
│  │                    │ │
│  │ Email              │ │
│  │ [______________]   │ │
│  │                    │ │
│  │ Mot de passe       │ │
│  │ [______________] 👁 │ │
│  │ Force: ████░░░     │ │
│  │                    │ │
│  │ Confirmer MDP      │ │
│  │ [______________] 👁 │ │
│  │                    │ │
│  │ ☑ J'accepte CGU    │ │
│  │                    │ │
│  │ [   S'inscrire  ]  │ │
│  │                    │ │
│  │ ─────────────────  │ │
│  │                    │ │
│  │ Déjà un compte ?   │ │
│  │  [Se connecter]    │ │
│  │                    │ │
│  └────────────────────┘ │
│                          │
├──────────────────────────┤
│        FOOTER            │
└──────────────────────────┘
```

---

## Interactions

### Desktop
- **Focus** : Bordure bleue sur les champs actifs
- **Hover** : Changement de couleur sur bouton et liens
- **Eye icon** : Toggle visibilité du mot de passe
- **Validation en temps réel** :
  - Email : Vérification du format
  - Mot de passe : Mise à jour de l'indicateur de force
  - Confirmation : Vérification de la correspondance

### Mobile
- **Touch** : Effet ripple sur bouton
- **Keyboard** : Type approprié pour chaque champ
- **Scroll automatique** : Lors du focus sur un champ

## Validation

### Règles de validation

#### Nom et Prénom
- **Requis** : Oui
- **Min length** : 2 caractères
- **Max length** : 50 caractères
- **Format** : Lettres uniquement (avec accents)

#### Email
- **Requis** : Oui
- **Format** : Email valide
- **Unicité** : Vérification côté serveur (email déjà utilisé)

#### Mot de passe
- **Requis** : Oui
- **Min length** : 8 caractères recommandé
- **Critères de force** :
  - Au moins une majuscule
  - Au moins un chiffre
  - Au moins un caractère spécial
- **Indicateur visuel** : Barre de progression

#### Confirmation mot de passe
- **Requis** : Oui
- **Règle** : Doit correspondre au mot de passe

#### CGU
- **Requis** : Oui
- **Règle** : Checkbox doit être cochée

### Messages d'erreur

```
Nom:
  - "Le nom est requis"
  - "Le nom doit contenir au moins 2 caractères"

Prénom:
  - "Le prénom est requis"
  - "Le prénom doit contenir au moins 2 caractères"

Email:
  - "L'email est requis"
  - "Veuillez entrer une adresse email valide"
  - "Cet email est déjà utilisé"

Mot de passe:
  - "Le mot de passe est requis"
  - "Le mot de passe doit contenir au moins 8 caractères"
  - "Le mot de passe doit contenir au moins une majuscule"
  - "Le mot de passe doit contenir au moins un chiffre"

Confirmation:
  - "La confirmation est requise"
  - "Les mots de passe ne correspondent pas"

CGU:
  - "Vous devez accepter les conditions générales"
```

### Messages de succès
- Toast notification : "Compte créé avec succès ! Bienvenue !"
- Redirection vers profil.php après 2 secondes

## États de la page

1. **État initial** : Formulaire vide, bouton désactivé
2. **État de saisie** : Validation en temps réel
3. **État d'erreur** : Affichage des messages d'erreur
4. **État de chargement** : Spinner sur le bouton pendant la création
5. **État de succès** : Message de confirmation + redirection

## Sécurité

- **CSRF Token** : Inclus dans le formulaire
- **SSL** : Formulaire en HTTPS uniquement
- **Hash password** : Côté serveur uniquement
- **Email verification** : Optionnel (envoyer email de confirmation)
- **Rate limiting** : Limiter les inscriptions par IP

## Accessibilité

- Labels associés aux champs
- Messages d'erreur annoncés par screen readers
- Ordre de tabulation logique
- Focus visible
- Contraste suffisant
- Bouton désactivé avec aria-disabled
