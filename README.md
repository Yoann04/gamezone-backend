# GameZone – Backend API (Symfony)

Backend du projet **GameZone**, une application dédiée à l’univers du jeu vidéo.  
Cette API fournit les données nécessaires au frontend (jeux, catégories, news) via des endpoints REST.

Projet réalisé dans le cadre du **Dossier Professionnel (DP) – Studi**.

---

## Présentation du projet

GameZone est une plateforme permettant de :

- consulter une **sélection de jeux vidéo**
- naviguer par **catégories**
- suivre l’**actualité gaming** via une section News

Ce dépôt contient **uniquement le backend API**, développé avec **Symfony**.

---

## Stack technique

- **Langage** : PHP 8.2+
- **Framework** : Symfony 6 LTS
- **Base de données** : MySQL
- **ORM** : Doctrine
- **Fixtures** : Doctrine Fixtures Bundle
- **CORS** : NelmioCorsBundle
- **Format API** : JSON
- **Versioning** : Git / GitHub

---

## Fonctionnalités principales

### Jeux

- Liste des jeux
- Détail d’un jeu (description longue, plateformes, note, avis, éditeur, développeur, modes…)
- Association à une catégorie
- Association aux news

### Catégories

- Liste des catégories
- Consultation des jeux par catégorie

### News

- Liste des news
- Détail d’une news
- News liées à un jeu
- Auteur, tags, date de publication

---

## Endpoints API (exemples)

### Jeux
