# HTML Mockups - Module Connexion

Ce dossier contient des maquettes HTML interactives qui servent de **référence visuelle** pour créer les wireframes Figma.

## Fichiers disponibles

- **[accueil-mockup.html](./accueil-mockup.html)** - Mockup de la page d'accueil
- **[connexion-mockup.html](./connexion-mockup.html)** - Mockup de la page de connexion

## Utilisation

### Visualiser les mockups localement

1. Ouvrez les fichiers HTML directement dans votre navigateur
2. Ou utilisez un serveur local :

```bash
# Avec Python 3
python -m http.server 8000

# Avec PHP
php -S localhost:8000

# Avec Node.js (npx http-server)
npx http-server
```

Puis accédez à : `http://localhost:8000/docs/mockups/`

### Utiliser comme référence pour Figma

Ces mockups HTML vous permettent de :
- **Visualiser le layout** : Structure et disposition des éléments
- **Tester les interactions** : Formulaires, validations, états
- **Voir les dimensions** : Espacement, padding, marges
- **Comprendre les états** : Normal, hover, focus, error, success
- **Observer le responsive** : Redimensionnez votre navigateur

### Capturer des screenshots pour Figma

Vous pouvez prendre des captures d'écran de ces mockups et les utiliser comme références dans Figma :

1. Ouvrez le mockup dans votre navigateur
2. Utilisez les outils de développement (F12) pour ajuster la taille de l'écran
3. Prenez une capture d'écran
4. Importez l'image dans Figma comme référence

## Fonctionnalités interactives

### Page de connexion
- ✅ Validation en temps réel des champs
- ✅ Messages d'erreur
- ✅ États de focus sur les inputs
- ✅ Simulation de soumission de formulaire

### Page d'accueil
- ✅ Navigation responsive
- ✅ Effets hover sur les boutons et cartes
- ✅ Layout adaptatif

## Styles et couleurs

Les mockups utilisent la palette de couleurs définie dans les spécifications :

```css
Primaire : #007bff
Secondaire : #6c757d
Succès : #28a745
Danger : #dc3545
Fond : #f8f9fa
Texte : #212529
```

## Responsive Design

Les mockups sont responsive et s'adaptent aux différentes tailles d'écran :
- **Desktop** : > 768px
- **Mobile** : ≤ 768px

Testez en redimensionnant votre navigateur.

## Notes importantes

⚠️ **Ces mockups sont des prototypes visuels** à des fins de démonstration et de référence uniquement. Ils ne sont pas destinés à être utilisés en production.

Pour le projet final, utilisez :
- Les wireframes Figma (à créer)
- Le code PHP/HTML/CSS du projet

## Prochaines étapes

1. Utilisez ces mockups comme référence visuelle
2. Consultez les spécifications détaillées dans `/docs/wireframes/`
3. Suivez le guide Figma dans `/docs/wireframes/GUIDE-FIGMA.md`
4. Créez les wireframes dans Figma
5. Validez les wireframes avec l'équipe
6. Passez à la phase de développement

## Ressources complémentaires

- [Spécifications wireframes](../wireframes/) - Documentation complète
- [Guide Figma](../wireframes/GUIDE-FIGMA.md) - Instructions pas à pas
- [README principal](../../README.md) - Documentation du projet
