# RevChef : Plateforme Multi-Rôles pour Expériences Culinaires

## Description
RevChef est une plateforme web conçue pour offrir des expériences culinaires uniques. Le site prend en charge deux rôles principaux :

1. **Clients** :
   - Découvrir les menus proposés par les chefs.
   - S'inscrire, se connecter et réserver des expériences culinaires.
2. **Chefs (Administrateurs)** :
   - Se connecter et gérer les réservations (accepter, refuser).
   - Consulter des statistiques détaillées.
   - Gérer leur profil.

## Fonctionnalités

### Fonctionnalités pour les Clients :
- Parcourir les menus des chefs.
- Réserver une expérience culinaire (choix de la date, heure et nombre de personnes).
- Gérer les réservations (consulter l’historique, modifier ou annuler une réservation).

### Fonctionnalités pour les Chefs :
- Approuver ou rejeter des réservations.
- Accéder à des statistiques détaillées :
  - Nombre de demandes en attente.
  - Réservations approuvées pour aujourd'hui.
  - Réservations approuvées pour demain.
  - Détails sur le prochain client.
  - Total des clients inscrits.
- Gérer leur profil.

### Design et UX :
- **Design Responsive** : Compatible avec les appareils mobiles, tablettes et ordinateurs.
- **Esthétique Moderne** : Design élégant et inspiré du luxe.
- **Interface Intuitive** : Navigation fluide et ergonomique.

## Technologies Utilisées

### Frontend :
- **HTML5** : Structure sémantique.
- **CSS3** : Mise en page responsive et personnalisée.
- **JavaScript** : Comportements interactifs et dynamiques.
- **SweetAlert** : Alertes élégantes pour confirmations et actions importantes.
- **Modals Dynamiques** : Affichage des informations sans rechargement de page.

### Backend :
- **PHP** : Gestion des rôles, authentification et réservations.
- **MySQL** : Base de données pour utilisateurs, rôles et réservations.

### Sécurité :
- **Hashage des Mots de Passe** : Sécurisation avec `password_hash()`.
- **Protection XSS** : Validation et nettoyage des entrées utilisateurs.
- **Prévention des Injections SQL** : Utilisation de requêtes préparées.
- **Jetons CSRF** : Sécurisation des actions sensibles (bonus).

## Structure des Fichiers
```plaintext
root/
├── public/
│   ├── css/
│   │   ├── style.css        # Styles généraux
│   │   ├── dashboard.css    # Styles spécifiques au tableau de bord
│   ├── js/
│   │   ├── app.js           # Comportements dynamiques
│   │   ├── validation.js    # Validation des formulaires
│   ├── img/                 # Images (logos, avatars, etc.)
├── src/
│   ├── controllers/
│   │   ├── AuthController.php      # Gestion de l'authentification
│   │   ├── ChefController.php      # Actions spécifiques aux chefs
│   │   ├── ClientController.php    # Actions spécifiques aux clients
│   ├── models/
│   │   ├── User.php                # Modèle utilisateur
│   │   ├── Reservation.php         # Modèle de réservation
│   ├── views/
│   │   ├── client/
│   │   │   ├── home.php            # Page d'accueil client
│   │   │   ├── reservation.php     # Page de réservation
│   │   ├── chef/
│   │   │   ├── dashboard.php       # Tableau de bord chef
│   │   │   ├── stats.php           # Page des statistiques
│   │   ├── shared/
│   │   │   ├── header.php          # En-tête partagé
│   │   │   ├── footer.php          # Pied de page partagé
├── config/
│   ├── database.php        # Connexion à la base de données
│   ├── constants.php       # Constantes globales du site
├── index.php               # Point d'entrée principal
├── README.md               # Documentation du projet
```

## Installation

1. **Cloner le Dépôt** :
   ```bash
   git clone https://github.com/your-username/RevChef.git
   cd RevChef
   ```

2. **Configurer la Base de Données** :
   - Importer le fichier `database.sql` situé dans le dossier `config/` dans votre base de données MySQL.
   - Mettre à jour les informations de connexion dans `config/database.php`.

3. **Configurer l’Environnement** :
   - Modifier `config/constants.php` avec les constantes nécessaires.

4. **Lancer l’Application** :
   - Démarrer un serveur local (XAMPP, WAMP ou serveur PHP intégré) :
     ```bash
     php -S localhost:8000
     ```

5. **Accéder au Site** :
   - Ouvrir `http://localhost:8000` dans votre navigateur.

## Bonnes Pratiques Respectées

1. **Structure du Code** :
   - Utilisation de l'architecture MVC (Modèle-Vue-Contrôleur).
   - Organisation claire pour faciliter la maintenance et l'évolutivité.

2. **Sécurité** :
   - Hashage sécurisé des mots de passe.
   - Validation et nettoyage des entrées pour éviter les attaques XSS.
   - Prévention des injections SQL avec des requêtes préparées.

3. **Design Responsive** :
   - Compatibilité assurée sur tous les types d'appareils.

4. **Améliorations JavaScript** :
   - Validation des formulaires avec des regex pour une saisie robuste.
   - Modals dynamiques et alertes interactives pour une meilleure expérience utilisateur.

