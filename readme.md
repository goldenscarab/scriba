# Scriba

Scriba est un outil de gestion de notes personnelles et de snippets moulés à la louche sous Laravel 5.2.
Une fois auto-hébergé ce superbe outil sera votre compagnon idéal pour votre voyage sur le web !

## Prérequis

- PHP >= 5.5.9
- Une base de données (MySQL, SQLite, ...)
- ...et les prérequis de Laravel 5.2

## Installation

1. Récupérer le code

`git clone https://github.com/goldenscarab/scriba`

2. Installer les dépendences de Laravel et du projet

`composer install`

3. Configurer la bête

`cp .env.example .env`  

puis

`vi .env`

enfin, générer une key d'application

`php artisan key:generate`

4. Invoquer les données

`php artisan migrate --seed`

Vous êtes prêt :) 
Un vhost plus tard (document root sur public/), vous êtes prêt à démarrer !

### Compte de démonstration

Le compte par défaut et **Root** et son mot de passe est **password** (à modifier, bien évidemment)

## Support

Ouvrez une issue sur GitHub pour que nous jettions un oeil si vous rencontrez un problème.  
Malheureusement, nous ne pourrons vous aider si le problème concerne l'installation de Laravel.

## Contribuer

N'hésitez pas à forker le projet et à proposer vos idées :)

## Licence

MIT