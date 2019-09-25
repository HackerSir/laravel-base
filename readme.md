# Laravel Base (6.0)
[![StyleCI(6.0)](https://styleci.io/repos/65561499/shield?branch=6.0)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/6.0/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=6.0)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.2.0+
- Yarn

## Framework
- Laravel 6.0
- Bootstrap 4
- Font Awesome 5
- Vue.js 2

## Including
- Packages
  - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper): ^2.6
  - [doctrine/dbal](https://github.com/doctrine/dbal): ^2.9
  - [predis/predis](https://github.com/nrk/predis): ^1.1
  - [recca0120/laravel-tracy](https://github.com/recca0120/laravel-tracy): ^1.9
  - [lavary/laravel-menu](https://github.com/lavary/laravel-menu): ^1.7
  - [marvinlabs/laravel-html-bootstrap-4](https://github.com/marvinlabs/laravel-html-bootstrap-4): dev-master
  - [marvinlabs/laravel-html-font-awesome](https://github.com/marvinlabs/laravel-html-font-awesome): "^1.0
  - [santigarcor/laratrust](https://github.com/santigarcor/laratrust): ^5.2
  - [laravelcollective/html](https://github.com/LaravelCollective/html): ^6.0
  - [yajra/laravel-datatables-buttons](https://github.com/yajra/laravel-datatables-buttons): ^4.8
  - [yajra/laravel-datatables-html](https://github.com/yajra/laravel-datatables-html): ^4.18
  - [yajra/laravel-datatables-oracle](https://github.com/yajra/laravel-datatables-oracle): ^9.6
  - [arcanedev/log-viewer](https://github.com/ARCANEDEV/LogViewer): ^4.7
  - [creativeorange/gravatar](https://github.com/creativeorange/gravatar): ^1.0
  - [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog): ^3.8
  - [spatie/laravel-backup](https://github.com/spatie/laravel-backup): ^6.4
- System
  - Membership system
    - Role-based access control
    - Toggleable registration
    - Toggleable email validation
    - **TODO**: Force user change password when you want

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
