<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## User api

Для запуска требуется:

- Создать .env, скопировать содержимое .env, внести данные своей базы данных(название, логин,пароль)
- npm install
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed --class=UsersSeeder
- php artisan db:seed --class=RolesSeeder
- php artisan serve
- php artisan queue:work


## Статический API ключ : 
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6ImRvZGk

## Емеил для отправки:
- email - seoprofy12332@gmail.com
- password - SeoProfy

## Работа с API

Посылать запросы через Postman

Список запросов:

- /api/users - Получить список всех пользователей (GET)

- /api/user?email={емеил} - Получить юзера по емеилу (GET)

- /api/user/sendEmail - Отправить письмо пользователю. (POST)
Обязательные поля - email,text. Если в email написать all, то текст отправится всем пользователям.

Для отправки запроса обязательно указывать поле access_token со статическим Api ключом  в header

Для отправки емеила на существующий постовый ящик, можно в админке заменить один из фейковых емеилов на настоящий. 
Для входа в админку надо войти на админа:

-login Admin@admin.com

-pass 1q2w3e4r 





