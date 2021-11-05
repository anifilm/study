Laravel
https://laravel.com/

# Windows에서 php / composer 설치

$ choco install php

$ choco install composer


# 컴포저 리눅스 설치

$ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin/

# 컴포저 리눅스 업그레이드

$ sudo composer self-update


# 컴포저로 라라벨 인스톨러 설치

$ composer global require laravel/installer


# [PHP] Arch Linux에서의 LEMP 스택 + Laravel 개발 환경 설치 매뉴얼
https://dev-overload.tistory.com/16


# 라라벨 프로젝트 생성하기
$ laravel new 프로젝트명


# 버전 지정하여 생성하기
$ composer create-project laravel/laravel="5.8.*" 프로젝트명


# 모델 생성
$ php artisan make:model Post


# 컨트롤러 생성
$ php artisan make:controller WelcomeController
