# Pizza task for innoscripta

Simple pizza ordering web application

## Quick partial demo

Demo: https://pizza-task-innoscripta.herokuapp.com

## Requirmtents
-   `>=` php (7.3.1)	
-   apache (2.4.41)


## INSTALLATION

Clone project to your local machine. Then

1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`

Set APP_KEY and database connection values  in .env file. Run below command to create tables and seeds.

`php artisan migrate:refresh --seed`

At last run `php artisan serve` to look at project.




