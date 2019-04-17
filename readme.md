# Laravel Base (5.8)
[![StyleCI(5.8)](https://styleci.io/repos/65561499/shield?branch=5.8)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/5.8/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=5.8)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.1.3+
- Yarn

## Framework
- Laravel 5.8
- Bootstrap 4
- Font Awesome 5
- Vue.js 2

## Including
- Packages
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
