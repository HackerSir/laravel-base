# Laravel Base (5.6)
[![StyleCI(5.6)](https://styleci.io/repos/65561499/shield?branch=5.6)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/5.6/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=5.6)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.1
- Yarn

## Framework
- Laravel 5.6
- Bootstrap 4
- Font Awesome 5
- Vue.js 2

## Including
- Packages
  - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper): ^2.4
  - [doctrine/dbal](https://github.com/doctrine/dbal): ^2.7
  - [predis/predis](https://github.com/nrk/predis): ^1.1
  - [recca0120/laravel-tracy](https://github.com/recca0120/laravel-tracy): ^1.8
  - [lavary/laravel-menu](https://github.com/lavary/laravel-menu): ^1.7
  - [santigarcor/laratrust](https://github.com/santigarcor/laratrust): 5.0.*
  - [arcanedev/log-viewer](https://github.com/ARCANEDEV/LogViewer): ^4.5
  - [laravelcollective/html](https://github.com/LaravelCollective/html): ^5.6
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

## Notice
- If you modify some files which need to be compiled, make sure you have run the following command before commit.  
(For testing in local, you can also compile files by using `yarn run dev` instead.)
```bash
yarn run production
```

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
