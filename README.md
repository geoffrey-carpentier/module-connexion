# module-connexion
Login Module

## Documentation

### Wireframes et Maquettes

Les spécifications complètes pour les wireframes et maquettes sont disponibles dans le dossier [`/docs/wireframes/`](./docs/wireframes/).

**Pages à créer :**
- [Accueil](./docs/wireframes/01-accueil.md) - Page d'accueil
- [Connexion](./docs/wireframes/02-connexion.md) - Page de connexion
- [Inscription](./docs/wireframes/03-inscription.md) - Page d'inscription
- [Admin](./docs/wireframes/04-admin.md) - Page d'administration
- [Profil](./docs/wireframes/05-profil.md) - Page de profil utilisateur

**Guide Figma :**
- [Guide pour créer les wireframes dans Figma](./docs/wireframes/GUIDE-FIGMA.md)

Chaque page est documentée avec :
- Wireframes desktop (1440px)
- Wireframes mobile (375px)
- Composants et interactions
- États et validation
- Messages d'erreur et de succès
- Règles d'accessibilité

## Structure du projet

```
module-connexion/
├── index.php           # Page d'accueil
├── connexion.php       # Page de connexion
├── inscription.php     # Page d'inscription
├── admin.php           # Page d'administration
├── profil.php          # Page de profil utilisateur
├── includes/
│   ├── config.php      # Configuration BDD
│   ├── fonctions.php   # Fonctions utilitaires
│   ├── header.php      # Header du site
│   └── footer.php      # Footer du site
├── css/
│   └── style.css       # Styles CSS
├── sql/
│   └── moduleconnexion.sql  # Base de données
└── docs/
    └── wireframes/     # Documentation des wireframes
