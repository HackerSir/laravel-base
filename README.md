# Laravel Base (7.x)
[![StyleCI(7.0)](https://styleci.io/repos/65561499/shield?branch=7.0)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/7.0/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=7.0)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.2.5+
- Yarn

## Framework
- Laravel 7.x
- Bootstrap 4
- Font Awesome 5
- Vue.js 2

## Including
- Packages
  - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper): ^2.6
  - [doctrine/dbal](https://github.com/doctrine/dbal): ^2.10
  - [lavary/laravel-menu](https://github.com/lavary/laravel-menu): ^1.7
- System


## Installation Guide
1. Run the following commands.
```bash
composer install  
yarn install
```

2. Copy `.env.example` to `.env`.
```bash
cp .env.example .env
```

3. Configure environment variables in `.env`.

4. Generate app key.
```bash
php artisan key:generate
```

5. Run migrations to setup tables.
```bash
php artisan migrate
```

6. Compile resource files.
```bash
yarn dev    # if in local testing
yarn prod   # if in production
```

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
