# Wireframe - Page d'Accueil (index.php)

## Objectif
Page d'accueil du module de connexion, servant de point d'entrée principal au site.

## Desktop (1440px)

### Structure

```
┌─────────────────────────────────────────────────────────────┐
│                          HEADER                              │
│  Logo        Accueil | Connexion | Inscription              │
└─────────────────────────────────────────────────────────────┘
│                                                              │
│                     HERO SECTION                             │
│                                                              │
│              Bienvenue sur Module Connexion                  │
│                                                              │
│         Un système d'authentification simple et sûr         │
│                                                              │
│            [Connexion]  [S'inscrire]                         │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                                                              │
│                   SECTION FONCTIONNALITÉS                    │
│                                                              │
│  ┌────────────┐  ┌────────────┐  ┌────────────┐            │
│  │   Icon     │  │   Icon     │  │   Icon     │            │
│  │  Sécurité  │  │ Simplicité │  │  Profils   │            │
│  │            │  │            │  │            │            │
│  │ Description│  │ Description│  │ Description│            │
│  └────────────┘  └────────────┘  └────────────┘            │
│                                                              │
├─────────────────────────────────────────────────────────────┤
│                          FOOTER                              │
│              © 2025 - Liens - Contact                        │
└─────────────────────────────────────────────────────────────┘
```

### Composants

#### Header
- **Logo/Titre** : Module Connexion (à gauche)
- **Navigation** :
  - Accueil (actif)
  - Connexion
  - Inscription
- **Position** : Sticky top

#### Hero Section
- **Titre principal (h1)** : "Bienvenue sur Module Connexion"
- **Sous-titre** : "Un système d'authentification simple et sûr"
- **CTA Buttons** :
  - Bouton primaire : "Connexion" (lien vers connexion.php)
  - Bouton secondaire : "S'inscrire" (lien vers inscription.php)
- **Background** : Couleur claire ou gradient subtil

#### Section Fonctionnalités
- **3 cartes** en disposition horizontale :
  1. **Sécurité** : Icon + description de la sécurité
  2. **Simplicité** : Icon + description de l'interface simple
  3. **Profils** : Icon + description de la gestion des profils

#### Footer
- **Copyright** : © 2025
- **Liens** : Mentions légales, Contact, etc.
- **Position** : Bottom

---

## Mobile (375px)

### Structure

```
┌──────────────────────────┐
│        HEADER            │
│  Logo        [Menu ☰]   │
└──────────────────────────┘
│                          │
│     HERO SECTION         │
│                          │
│  Bienvenue sur Module    │
│      Connexion           │
│                          │
│  Un système d'auth...    │
│                          │
│     [Connexion]          │
│     [S'inscrire]         │
│                          │
├──────────────────────────┤
│                          │
│  ┌──────────────────┐   │
│  │     Icon         │   │
│  │   Sécurité       │   │
│  │   Description    │   │
│  └──────────────────┘   │
│                          │
│  ┌──────────────────┐   │
│  │     Icon         │   │
│  │  Simplicité      │   │
│  │   Description    │   │
│  └──────────────────┘   │
│                          │
│  ┌──────────────────┐   │
│  │     Icon         │   │
│  │    Profils       │   │
│  │   Description    │   │
│  └──────────────────┘   │
│                          │
├──────────────────────────┤
│        FOOTER            │
│      © 2025              │
│       Liens              │
└──────────────────────────┘
```

### Composants

#### Header Mobile
- **Logo/Titre** : Version compacte
- **Menu hamburger** : Icon ☰ (ouvre menu latéral)
- **Menu mobile** : Navigation verticale

#### Hero Section Mobile
- **Titre** : Taille réduite, centré
- **Sous-titre** : Texte plus court
- **CTA Buttons** : Stack vertical, pleine largeur

#### Section Fonctionnalités Mobile
- **Cartes empilées** : Disposition verticale
- **Espacement** : Plus compact

---

## Interactions

### Desktop
- Hover sur boutons : Changement de couleur
- Hover sur cartes : Légère élévation (shadow)
- Navigation : Soulignement au survol

### Mobile
- Touch sur boutons : Effet ripple
- Swipe horizontal : Possibilité de navigation entre sections
- Menu hamburger : Animation slide-in

## États

- **État normal** : Page chargée
- **État hover** : Sur les éléments interactifs
- **État actif** : Navigation active sur "Accueil"

## Accessibilité

- Contraste de couleurs suffisant (WCAG AA)
- Taille de police lisible (min 16px)
- Boutons avec zones de touch suffisantes (min 44x44px sur mobile)
- Semantic HTML (headings, nav, main, footer)
