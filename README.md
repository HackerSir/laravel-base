# Laravel Base (5.3)
[![StyleCI(5.3)](https://styleci.io/repos/65561499/shield?branch=5.3)](https://styleci.io/repos/65561499)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Framework
- Laravel 5.3
- Bootstrap 4

## Including
- Packages
  - laravelcollective/html: "^5.3"
  - predis/predis: "^1.1"
  - barryvdh/laravel-ide-helper: "^2.2"
  - doctrine/dbal: "^2.5"
- System
  - User

## Installation Guide
1. Run the following commands.
```bash
composer install  
npm install  
gulp
```

2. Configure environment variables in `.env`.

3. Run migrations to setup tables.
```bash
php artisan migrate
```

## TODO
- Packages
  - zizaco/entrust: "5.2.x-dev"
  - arcanedev/log-viewer: "~3.0"
  - graham-campbell/throttle: "^5.2"
  - laravolt/semantic-form: "^1.3"
  - recca0120/laravel-tracy: "^1.5.6"
  - lavary/laravel-menu: "dev-master"
  - thomaswelton/laravel-gravatar: "^1.1"
  - landish/pagination: "^1.3"
- System
  - Role
  - Permission

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
