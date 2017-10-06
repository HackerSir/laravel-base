# Laravel Base (5.5)
[![StyleCI(5.5)](https://styleci.io/repos/65561499/shield?branch=5.5)](https://styleci.io/repos/65561499)
[![codecov](https://codecov.io/gh/HackerSir/laravel-base/branch/5.5/graph/badge.svg)](https://codecov.io/gh/HackerSir/laravel-base)
[![Build Status](https://travis-ci.org/HackerSir/laravel-base.svg?branch=5.5)](https://travis-ci.org/HackerSir/laravel-base)
[![License](https://img.shields.io/github/license/HackerSir/laravel-base.svg)](https://raw.githubusercontent.com/HackerSir/laravel-base/master/LICENSE)

A website base on Laravel and Bootstrap for HackerSir.

## Required
- PHP 7.1

## Framework
- Laravel 5.5
- Bootstrap 4 Beta
- Vue.js 2

## Including
- Packages
  - laravelcollective/html: "^5.5"
  - predis/predis: "^1.1"
  - barryvdh/laravel-ide-helper: "^2.4"
  - doctrine/dbal: "^2.6"
  - recca0120/laravel-tracy: "^2.4"
  - thomaswelton/laravel-gravatar: "^1.1"
  - santigarcor/laratrust: "^4.0"
  - graham-campbell/throttle: "^6.0"
  - lavary/laravel-menu: "^1.6"
  - arcanedev/log-viewer: "^4.4"
  - yajra/laravel-datatables-buttons: "^3.0"
  - yajra/laravel-datatables-html: "^3.1"
  - yajra/laravel-datatables-oracle: "^8.0"
  - yish/generators: "^2.0"
- System
  - User
  - Role
  - Permission

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

## Use Laradock
If you want to run this project in [Laradock](http://laradock.io/), you can follow this steps.
1. Make sure you have [Docker and Docker Compose](https://www.docker.com/) installed.
2. Clone submodule `laradock`. ([ref](http://blog.chh.tw/posts/git-submodule/))
    1. Initial submodule  
        ```bash
        git submodule init
        ```
    2. Update submodule
        ```bash
        git submodule update
        ```
    - Or you can just add `--recursive` when you `git clone` this project.
3. Copy settings.
    ```bash
    cp .env.laradock .env
    cp laradock/env-example laradock/.env
    ```
4. Run containers.
    ```bash
    cd laradock
    docker-compose up -d nginx mysql redis
    ```
5. Open your browser and visit localhost: `http://localhost`.

If you want to enter the workspace container, to execute commands like  (Artisan, Composer, PHPUnit, Gulp, …)  
```bash
docker-compose exec workspace bash
```

## License
This project is open-source under the [MIT license](http://opensource.org/licenses/MIT).
