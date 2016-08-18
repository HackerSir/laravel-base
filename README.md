# Laravel Base (5.2)
[![StyleCI(5.2)](https://styleci.io/repos/65561499/shield?branch=5.2)](https://styleci.io/repos/65561499)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on laravel and semantic ui for HackerSir.

## Framework
- Laravel 5.2
- Semantic UI

## Including
- Packages
  - laravelcollective/html: "5.2.*"
  - zizaco/entrust: "5.2.x-dev"
  - arcanedev/log-viewer: "~3.0"
  - barryvdh/laravel-ide-helper: "^2.2"
  - graham-campbell/throttle: "^5.2"
  - laravolt/semantic-form: "^1.3"
  - doctrine/dbal: "v2.5.4"
  - predis/predis: "^1.1"
  - recca0120/laravel-tracy: "^1.5.6"
  - lavary/laravel-menu: "dev-master"
  - thomaswelton/laravel-gravatar: "^1.1"
  - landish/pagination: "^1.3"
- System
  - User
  - Role
  - Permission

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

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
