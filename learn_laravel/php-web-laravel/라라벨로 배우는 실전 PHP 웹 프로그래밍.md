라라벨로 배우는 실전 PHP 웹 프로그래밍


# 라라벨 프로젝트 생성하기
$ laravel new 프로젝트명

# 버전 지정하여 생성하기 (laravel 5.8.* 설치시 -> php 버전 의존성 확인 7.1.3)
$ composer create-project laravel/laravel="6.*" 프로젝트명


# mix.browserSync() 사용

$ npm i -D browser-sync browser-sync-webpack-plugin

> webpack.mix.js 에 다음 내용 추가
mix.browserSync('127.0.0.1:8000');


# MySQL 데이터베이스 생성 (lara_myapp)

> create database lara_myapp;

# 라라벨 데이터베이스 마이그레이션

$ php artisan migrate

# 라라벨 데이터베이스 마이그레이션 (초기화 후 재생성)

$ php artisan migrate:refresh
