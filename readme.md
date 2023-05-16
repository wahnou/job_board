# Simple Job Board made with Symfony 5.4

Back : PHP 7 (symfony 5.4), postgresql
Front : twig, bootstrap

Install PHP dependencies using Composer:

```bash
composer install
```

run database migrations:

```bash
php bin/console doctrine:migrations:migrate
```

If you want some data to start you can load fixtures:

```bash
php bin/console doctrine:fixtures:load
```