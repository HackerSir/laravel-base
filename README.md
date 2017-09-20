# Laravel Base (5.5)
[![StyleCI(5.5)](https://styleci.io/repos/65561499/shield?branch=5.5)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/5.5/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=5.5)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Framework
- Laravel 5.5
- Bootstrap 4 Beta
- Vue.js 2

## Including
- Packages
  - [TODO] laravelcollective/html: "^5.4"
  - [TODO] predis/predis: "^1.1"
  - [TODO] barryvdh/laravel-ide-helper: "^2.3"
  - [TODO] doctrine/dbal: "^2.5"
  - [TODO] recca0120/laravel-tracy: "^1.8"
  - [TODO] thomaswelton/laravel-gravatar: "^1.1"
  - [TODO] santigarcor/laratrust: "^3.2"
  - [TODO] graham-campbell/throttle: "^5.3"
  - [TODO] lavary/laravel-menu: "^1.6"
  - [TODO] arcanedev/log-viewer: "^4.3"
  - [TODO] yajra/laravel-datatables-buttons: "^1.3"
  - [TODO] yajra/laravel-datatables-html: "^1.2"
  - [TODO] yajra/laravel-datatables-oracle: "^7.6"
  - [TODO] yish/generators: "^1.1"
- System
  - [TODO] User
  - [TODO] Role
  - [TODO] Permission

## Installation Guide
1. Run the following commands.
```bash
composer install  
npm install
```

2. Copy `.env.example` to `.env`.

3. Configure environment variables in `.env`.

4. Generate app key.
```bash
php artisan key:generate
```

5. Run migrations to setup tables.
```bash
php artisan migrate
```

## Notice
- If you modify some files which need to be compiled, make sure you have run the following command before commit.  
(For testing in local, you can also compile files by using `gulp` instead.)
```bash
gulp --production
```

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
