# Installation – GameZone Backend

## Prérequis

- PHP 8.1 minimum (8.3+ pour lancer les tests PHPUnit 12)
- Composer
- MySQL 8+
- Symfony CLI (optionnel)

## Installation

```bash
composer install
cp .env.local.example .env.local
# configurer les identifiants MySQL
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
symfony serve -d
```
