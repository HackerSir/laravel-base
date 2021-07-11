# Laravel Base (8.x)
[![StyleCI](https://styleci.io/repos/65561499/shield?branch=8.x)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/8.x/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=8.x)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.4+
- NodeJs (14) / Yarn

## Framework
- Laravel 8.x

## Including
- Packages
  - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper): ^2.9
  - [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar): ^3.5
  - [doctrine/dbal](https://github.com/doctrine/dbal): ^3.1
  - [lavary/laravel-menu](https://github.com/lavary/laravel-menu): ^1.8

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
