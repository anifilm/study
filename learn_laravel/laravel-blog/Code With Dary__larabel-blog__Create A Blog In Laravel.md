How To Create A Blog In Laravel 8 - Code With Dary
https://youtu.be/HKJDLXsTr8A


# 프로젝트 생성 및 기본 구성

$ laravel new laravel-blog

$ cd laravel-blog

$ composer require laravel-frontend-presets/tailwindcss --dev

$ php artisan ui tailwindcss --auth

$ npm remove laravel-mix

$ npm i -D laravel-mix

$ npm i -D cross-env


$ npm run watch


$ php artisan make:controller PagesController

$ php artisan route:list


$ php artisan serve


$ php artisan make:controller PostsController --resource

$ php artisan make:model Post
