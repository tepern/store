## Features

Laravel 9

Laravel-admin

Node.js

## Installation

git clone https://github.com/tepern/store.git

cd store

Create .env from .env.example

composer install

## Migrations

php artisan migrate

## Seeding

php artisan migrate:fresh --seed

## Admin panel

php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

php artisan serve

Visit http://127.0.0.1:8000/admin

## Store

npm install

npm run dev

Visit http://127.0.0.1:8000/

