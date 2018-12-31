# Architecture et Développement Web - Projet
Projet réalisé dans le cadre de l'UE "Architecture et Développement Web"

## Objectif
L'objectif de ce projet a été de développer un site web (frontend et backend) d'e-commerce en modèle MVC,
permettant à un utilisateur d'effectuer diverses opérations comme créer un compte ou commander des produits.

## Technologies
Frontend :
* HTML
* CSS
* BOOTSTRAP
* Javascript
* TWIG

Backend :
* PHP
* DOCTRINE
* composer

BDD :
* MySQL

## Fonctionnalités

### Page d'accueil

Sur la page d'accueil, l'utilisateur peut visualiser :

* les derniers jeux sortis.
* les meilleures ventes.

Pour accéder à cette page, cliquer sur le logo du site présent sur la barre de navigation.

### Barre de recherche

La barre de recherche permet d'effectuer une recherche parmi les jeux sur cinq critères :

* le titre
* l'éditeur
* le développeur
* la plateforme
* les genres

L'utilisateur écrit une chaîne de caractères dans la barre de recherche, et les jeux affichés sont ceux possédant cette chaîne dans l'un des cinq critères susévoqués.

### Catalogue

Sur le catalogue, l'utilisateur peut visualiser la totalité des jeux présents sur le site, et pour chacun une série d'informations comme l'éditeur ou encore le prix. S'il le souhaite, l'utilisateur peut affiner la liste des jeux affichée via six options de filtrage :

* les éditeurs
* les développeurs
* les plateformes
* les genres
* des périodes de date de sortie
* des fourchettes de prix

Pour accéder à cette page, cliquer sur `Catalogue` dans la barre de navigation.

### Page produit

La page produit d'un jeu permet de visualiser quelques informations supplémentaires sur un jeu par rapport à celles affichées dans le catalogue. De plus, la page produit permet à l'utilisateur d'ajouter un jeu dans son panier (opération possible uniquement si l'utilisateur est connecté).

Pour accéder à cette page, cliquer (entre autres possibilités) sur une jaquette d'un jeu dans le menu `Catalogue`.

### Création d'un compte utilisateur

Pour créer un compte utilisateur, un utilisateur doit renseigner quatre champs :

* un pseudonyme
* une adresse mail
* un mot de passe
* une confirmation du mot de passe

Le bouton permettant à l'utilisateur de créer le compte n'apparaît que s'il a rempli les quatre champs correctement (adresse mail valide, confirmation du mot de passe égale au mot de passe, etc...). Avant de confirmer la création du compte, il est vérifié que l'utilisateur n'a pas rentré un pseudonyme ou encore une adresse mail déjà utilisée par un autre utilisateur, auquel cas il en est informé et peut modifier ses informations.

Pour accéder à cette page, ouvrir le menu déroulant `Utilisateur` dans la barre de navigation puis cliquer sur `Créer un compte`.

### Page de connexion

Pour se connecter à son compte, l'utilisateur doit renseigner l'adresse mail ainsi que le mot de passe de son compte. S'il existe bien un compte comportant ces informations, l'utilisateur accède à son compte. Dans le cas contraire, il lui sera notifié qu'une erreur est présente.

Pour accéder à cette page, ouvrir le menu déroulant `Utilisateur` dans la barre de navigation puis cliquer sur `Se connecter`.

### Compte utilisateur

L'utilisateur retrouve sur un ton humoristique ses informations renseignées par ses soins dans une page dédiée. En cliquant sur le lien `Modifier mon compte` présent sur ladite page, l'utilisateur accède à une page lui permettant de modifier diverses informations de son compte comme son pseudonyme, son nom ou encore son adresse mail (il aperçoit les informations actuelles sur les différents champs dédiés). Comme sur la page de connexion et la page de création de compte, l'utilisateur ne peut modifier ses informations que si celles-ci sont valides, et il lui sera indiqué si l'une de ses modifications est déjà prise par un autre utilisateur (valable pour certaines informations uniquement, comme l'adresse mail).

Pour accéder à cette page, ouvrir le menu déroulant portant le pseudonyme de l'utilisateur dans la barre de navigation puis cliquer sur `Mon compte`.

### Panier

Une fois connecté, l'utilisateur peut accéder à son panier. Il voit ainsi les jeux composant ledit panier, et le montant total qui en découle. Il peut également enlever des jeux de son panier s'il le souhaite.

Pour accéder à cette page, ouvrir le menu déroulant portant le pseudonyme de l'utilisateur dans la barre de navigation puis cliquer sur `Mon panier`.
