Todo List App with Laravel and Vue.js
https://youtu.be/UHSipe7pSac

https://github.com/frkyldrm/laravel-vue-todolist


# 프로젝트 생성 및 기본 구성

$ laravel new laravel-vue-todolist 또는
$ composer create-project --prefer-dist laravel/laravel laravel-vue-todolist

$ mysql -u root -p
> create database lara_todolist
> exit

$ php artisan make:model Item -m

(데이터베이스 마이그레이션 수정 후)

$ php artisan migrate


# 개발 서버 실행

$ php artisan serve


# 컨트롤러 추가

$ php artisan make:controller ItemController --resource

(포스트맨을 통한 api 검증)


# vue.js 설치

$ npm i

$ npm i vue

$ npm i vue-loader -D

$ npm i vue-template-compiler -D


# fontawesome 설치

$ npm i @fortawesome/fontawesome-svg-core

$ npm i @fortawesome/free-solid-svg-icons

$ npm i @fortawesome/vue-fontawesome
