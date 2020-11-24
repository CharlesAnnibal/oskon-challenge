# OSKON CHALLENGE - API


### Starting - Run and do these commands and configs

`$ composer update`
To update and download packages

`$ composer dump-autoload`
To generate autoloaded classes from the project

`$ cp .env.example .env`

Set Database connection in .env file. 

Change these constants below:
DB_CONNECTION=sqlite
DB_DATABASE=D:\projsWeb\oskon-challenge\database\database.db

`$ php artisan key:generate`

`$ php artisan serve`



## ENDPOINTS

| URL                                 | HTTP VERB | REQUEST Header                                          |
|-------------------------------------|-----------|---------------------------------------------------------|
| http://127.0.0.1:8000/api/user      | POST      | Content-Type: application/json accept: application/json |
| http://127.0.0.1:8000/api/user      | GET       |                                                         |
| http://127.0.0.1:8000/api/user/{id} | GET       |                                                         |
| http://127.0.0.1:8000/api/user/{id} | PUT       | Content-Type: application/json accept: application/json |
| http://127.0.0.1:8000/api/user/{id} | DELETE    |                                                         |

## Fields

| Field name | Type | format                                          | Is required | Is unique |
|------------|------|-------------------------------------------------|-------------|-----------|
| name       | Text | Default text                                    | True        | True      |
| email      | Text | email (example@gmail.com)                       | True        | True      |
| gender     | Text | One character; uppercase; options:['M','F','X'] | True        | False     |
| birthday   | Date | Date format: dd-mm-yyyy                         | True        | False     |


