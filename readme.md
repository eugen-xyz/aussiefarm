# AussieFarm
I created a simple implementation of the AussieFarm based on the requirements.

## Technical Info
Laravel Version 5.8

PHP version 7.2

## Installation

1. Clone this project.
2. Create a database named `aussiefarm`
3. Create a  .env by copying .env.example and fillout the following:

```php
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=aussiefarm
DB_USERNAME=
DB_PASSWORD=
```

3. run `composer install`
4. run `php artisan migrate`
5. you may visit the site using the proper `APP_URL` set on .env.

## SQL Dump 
On this repo, you may find `aussiefarm.sql`, you may import this to your server.

## Adding Pets
1. Go to Navigation > Pets > Kangaroos 
2. Click `Add New` and filllout the form.
3. Click Submit

## Updating Pets
1. Go to Navigation > Pets > Kangaroos
2. Listed are the available Kangaroos
3. To update, go to the `Action` column and click the edit icon.
4. Update the pet info and click `Update`

## Viewing Pets
1. Go to Navigation > Click Home or AussieFarm
2. Listed are the available Kangaroos
4. Click `More Details` to view Kangaroo details
