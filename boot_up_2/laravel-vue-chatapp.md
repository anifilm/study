Real-Time Chat with Laravel, Vue.js & Pusher
https://www.youtube.com/watch?v=CkRGJC0ytdU&t=664s&ab_channel=Scrypster

# 프로젝트 생성 및 기본 구성

$ laravel new laravel-vue-chatapp 또는
$ composer create-project --prefer-dist laravel/laravel laravel-vue-chatapp

$ mysql -u root -p
> create database lara_chatapp
> exit

$ composer require laravel/sanctum

$ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

$ composer require laravel/jetstream
(/etc/php/php.ini -> iconv 활성화 필요)

$ php artisan jetstream:install inertia

$ php artisan migrate

$ npm i

$ npm run dev

$ php artisan vendor:publish --tag=jetstream-views


# 개발 서버 실행

$ php artisan serve

$ npm run hot


# 모델 추가

$ php artisan make:model ChatRoom -m

$ php artisan make:model ChatMessage -m

(데이터베이스 마이그레이션 수정 후)

$ php artisan migrate

$ php artisan make:seeder CharRoomSeeder

(데이터베이스 시더 수정 후)

$ php artisan db:seed
