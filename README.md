# Tom Troc 

Plateforme de partage et de revente de livres d'occasion en ligne. Tom Troc permet aux utilisateurs de créer des annonces pour vendre leurs livres, de parcourir les offres disponibles et de communiquer directement avec les vendeurs.

---

## Fonctionnalités

- **Gestion des comptes utilisateur** : Inscription et authentification sécurisée
- **Gestion des annonces** : Créer, modifier et supprimer vos annonces de livres
- **Système de messagerie** : Communiquer directement avec les vendeurs
- **Recherche et filtrage** : Rechercher et filtrer les livres disponibles par critères
- **Architecture MVC** : Code bien structuré et maintenable

---

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés :

- **XAMPP** (ou un serveur Apache/PHP compatible)
- **Apache 2.4.58** (Win64)
- **PHP 8.2.12**
- **MySQL** (inclus dans XAMPP)
- **OpenSSL 3.1.3**

---

Langage : PHP 8.2.12 (sans dépendances externes)
Serveur web : Apache 2.4.58
Base de données : MySQL (relationnel)
Architecture : MVC (Model-View-Controller)
Frontend : HTML5, CSS3, JavaScript.

---

## Installation

### 1. Cloner le projet

Placez le projet dans le dossier `htdocs` de XAMPP :
C:\xampp\htdocs\Tom_Troc

### 2. Importer la base de données :

Ouvrez phpMyAdmin : http://localhost/phpmyadmin/
Créez une nouvelle base de données (ou utilisez une existante)
Importez le fichier SQL fourni : tomtroc.sql
Allez dans l'onglet Importer
Sélectionnez le fichier tomtroc.sql
Cliquez sur Exécuter

### 3. Lancer le serveur :

Démarrez XAMPP (Apache et MySQL doivent être activés)
Ouvrez votre navigateur et accédez à : http://localhost/Tom_Troc/

