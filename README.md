# module-connexion

Login Module

## Documentation

### 📚 Documentation complète

Pour une vue d'ensemble complète de toute la documentation disponible, consultez le [**Résumé de la documentation**](./docs/SUMMARY.md).

### Wireframes et Maquettes

Les spécifications complètes pour les wireframes et maquettes sont disponibles dans le dossier [`/docs/wireframes/`](./docs/wireframes/).

**Pages à créer :**

- [Accueil](./docs/wireframes/01-accueil.md) - Page d'accueil
- [Connexion](./docs/wireframes/02-connexion.md) - Page de connexion
- [Inscription](./docs/wireframes/03-inscription.md) - Page d'inscription
- [Admin](./docs/wireframes/04-admin.md) - Page d'administration
- [Profil](./docs/wireframes/05-profil.md) - Page de profil utilisateur

**Guide et ressources :**

- [Guide pour créer les wireframes dans Figma](./docs/wireframes/GUIDE-FIGMA.md)
- [Mockups HTML interactifs](./docs/mockups/) - Références visuelles

Chaque page est documentée avec :

- Wireframes desktop (1440px) et mobile (375px)
- Composants et interactions détaillés
- États et validation
- Messages d'erreur et de succès
- Règles d'accessibilité (WCAG AA)

## Structure du projet

   
````
    markdown

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
```
