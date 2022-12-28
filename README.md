git clone https://github.com/hilcrhymer78787/laravel_api_tutorial.git



【フロントエンド】

cd laravel_api_tutorial/vue

cp .env.example .env

npm install

npm run serve



【バックエンド】

cd laravel_api_tutorial

docker-compose up -d --build

docker-compose exec app bash

cp .env.example .env

composer install

php artisan key:generate

php artisan migrate:refresh --seed



【ローカル環境APIのURL】
http://localhost:8001