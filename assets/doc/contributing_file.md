# 🤝 Guide de Contribution - Module Connexion

Merci de votre intérêt pour contribuer au projet Module Connexion ! Ce guide vous aidera à comprendre comment participer au développement.

## 📋 Table des matières

- [Code de conduite](#code-de-conduite)
- [Comment contribuer](#comment-contribuer)
- [Signaler un bug](#signaler-un-bug)
- [Proposer une nouvelle fonctionnalité](#proposer-une-nouvelle-fonctionnalité)
- [Soumettre des modifications](#soumettre-des-modifications)
- [Standards de code](#standards-de-code)
- [Processus de revue](#processus-de-revue)

## 📜 Code de conduite

En participant à ce projet, vous acceptez de respecter notre code de conduite :

- Soyez respectueux et courtois envers les autres contributeurs
- Acceptez les critiques constructives
- Concentrez-vous sur ce qui est le mieux pour la communauté
- Montrez de l'empathie envers les autres membres de la communauté

## 🚀 Comment contribuer

Il existe plusieurs façons de contribuer au projet :

1. **Signaler des bugs** : Trouvé un problème ? Faites-le nous savoir !
2. **Proposer des fonctionnalités** : Une idée d'amélioration ? Partagez-la !
3. **Corriger des bugs** : Choisissez une issue et proposez une solution
4. **Améliorer la documentation** : Aidez-nous à améliorer les docs
5. **Traduire** : Aidez à rendre le projet accessible dans d'autres langues

## 🐛 Signaler un bug

Avant de signaler un bug, vérifiez qu'il n'a pas déjà été signalé dans les [Issues](https://github.com/geoffrey-carpentier/module-connexion/issues).

### Format de rapport de bug

Créez une nouvelle issue avec le format suivant :

**Titre** : [BUG] Description courte du problème

**Description** :
```
## Description
Description détaillée du bug

## Étapes pour reproduire
1. Aller sur '...'
2. Cliquer sur '...'
3. Faire défiler jusqu'à '...'
4. Voir l'erreur

## Comportement attendu
Ce qui devrait se passer

## Comportement actuel
Ce qui se passe réellement

## Captures d'écran
Si applicable, ajoutez des captures d'écran

## Environnement
- OS: [ex: Windows 10]
- Navigateur: [ex: Chrome 120]
- Version PHP: [ex: 8.2]
- Version MySQL: [ex: 8.0]

## Informations supplémentaires
Toute autre information utile
```

## 💡 Proposer une nouvelle fonctionnalité

Les propositions de nouvelles fonctionnalités sont les bienvenues !

### Format de proposition

Créez une nouvelle issue avec le format suivant :

**Titre** : [FEATURE] Description de la fonctionnalité

**Description** :
```
## Description
Décrivez la fonctionnalité que vous aimeriez voir ajoutée

## Motivation
Pourquoi cette fonctionnalité serait-elle utile ?

## Solution proposée
Comment cette fonctionnalité pourrait être implémentée ?

## Alternatives considérées
Quelles alternatives avez-vous envisagées ?

## Informations supplémentaires
Contexte additionnel, mockups, exemples...
```

## 📝 Soumettre des modifications

### 1. Fork le projet

Cliquez sur le bouton "Fork" en haut à droite de la page du repository.

### 2. Clonez votre fork

```bash
git clone https://github.com/VOTRE-USERNAME/module-connexion.git
cd module-connexion
```

### 3. Créez une branche

```bash
git checkout -b feature/nom-de-votre-fonctionnalite
```

ou pour un bugfix :

```bash
git checkout -b fix/nom-du-bug
```

### 4. Faites vos modifications

- Écrivez du code propre et commenté
- Suivez les [standards de code](#standards-de-code)
- Testez vos modifications

### 5. Committez vos changements

```bash
git add .
git commit -m "Description claire de vos modifications"
```

Format recommandé des messages de commit :
- `feat: ajoute nouvelle fonctionnalité X`
- `fix: corrige le bug Y`
- `docs: met à jour la documentation`
- `style: améliore le CSS/design`
- `refactor: restructure le code`
- `test: ajoute des tests`

### 6. Pushez vers votre fork

```bash
git push origin feature/nom-de-votre-fonctionnalite
```

### 7. Créez une Pull Request

1. Allez sur votre fork sur GitHub
2. Cliquez sur "Compare & pull request"
3. Remplissez le template de PR
4. Soumettez la PR

### Template de Pull Request

```markdown
## Description
Brève description de vos modifications

## Type de changement
- [ ] Bug fix (correction d'un problème)
- [ ] Nouvelle fonctionnalité (ajout de fonctionnalité)
- [ ] Breaking change (modification incompatible)
- [ ] Documentation

## Checklist
- [ ] Mon code suit les standards du projet
- [ ] J'ai commenté les parties complexes
- [ ] J'ai mis à jour la documentation
- [ ] Mes modifications ne génèrent pas de nouveaux warnings
- [ ] J'ai testé mes modifications

## Tests effectués
Décrivez les tests que vous avez effectués

## Captures d'écran (si applicable)
Ajoutez des captures d'écran si pertinent
```

## 📐 Standards de code

### PHP

- Indentation : 4 espaces (pas de tabulations)
- Accolades sur nouvelle ligne pour les fonctions/classes
- Commentaires PHPDoc pour les fonctions
- Pas de balise de fermeture `?>` en fin de fichier PHP pur

```php
<?php
/**
 * Description de la fonction
 * 
 * @param string $param Description du paramètre
 * @return bool Description du retour
 */
function maFonction($param)
{
    // Code ici
    return true;
}
```

### HTML

- Indentation : 4 espaces
- Toujours fermer les balises
- Attributs entre guillemets doubles
- HTML5 semantic tags

```html
<section class="mon-contenu">
    <h2>Titre</h2>
    <p>Contenu</p>
</section>
```

### CSS

- Indentation : 4 espaces
- Une déclaration par ligne
- Ordre alphabétique des propriétés
- Commentaires pour les sections

```css
/* Section principale */
.ma-classe {
    background: #ffffff;
    color: #000000;
    padding: 1rem;
}
```

### SQL

- Mots-clés en MAJUSCULES
- Indentation pour la lisibilité
- Requêtes préparées obligatoires

```sql
SELECT id, login, prenom, nom
FROM utilisateurs
WHERE login = ?
ORDER BY created_at DESC;
```

### Nommage

- **Variables** : camelCase (`$monUtilisateur`)
- **Fonctions** : camelCase (`maFonction()`)
- **Classes** : PascalCase (`MaClasse`)
- **Constantes** : UPPERCASE (`DB_HOST`)
- **Fichiers** : snake_case (`mon_fichier.php`)
- **Tables SQL** : snake_case (`utilisateurs`)

## 🔍 Processus de revue

1. Un mainteneur examinera votre PR
2. Des commentaires ou suggestions peuvent être faits
3. Effectuez les modifications demandées si nécessaire
4. Une fois approuvée, votre PR sera mergée
5. Votre contribution sera ajoutée au CHANGELOG

## 🎯 Priorités actuelles

Consultez les [Issues](https://github.com/geoffrey-carpentier/module-connexion/issues) avec les labels :
- `good first issue` : Parfait pour débuter
- `help wanted` : Nous recherchons de l'aide
- `priority: high` : Priorité élevée

## 📞 Besoin d'aide ?

- Consultez la [documentation](README.md)
- Lisez le [guide d'installation](INSTALLATION.md)
- Ouvrez une issue avec le label `question`
- Contactez les mainteneurs

## 🙏 Remerciements

Merci à tous les contributeurs qui aident à améliorer ce projet !

Votre contribution, aussi petite soit-elle, est grandement appréciée. 💖

---

**Bon coding !** 🚀
