![Logo Nextale](https://github.com/nextalebr/desafio-backend/blob/master/nextale.jpeg "Nextale")

## About the vacancy candidate

My name is João Coelho, Brazilian born in Barbalha a city in the state of Ceará.
I am passionate about technology and since I was 12 years old I have ventured into the world of programming.

## About Project

This challenge is part of the backend developer selection phase. Your assessment will be given by the phases you manage to deliver and the way they were developed.

## Comands run project

- $ git clone https://github.com/joaocg/desafio-nextale.git
- $ cd desafio-nextale
- $ composer intall
- $ cp .env.example ./.env
- $ php artisan key:generate
- $ nano or vi .env

Configure the database credentials in the .env file opened with the previous command, save and close file.

- $ php artisan migrate
- $ php artisan db:seed --class=UserSeeder
- $ php artisan serve

## Endpoints

- /api/v1 -> Group routs to api
- /api/v1/story -> Route, [GET, POST, PUT and DELETE], to listing, create, update and delete of Stories;
- /api/v1/story/{id} -> Route, [GET], to liting sotiry by id;
- /api/v1/media -> Route, [GET, POST, PUT and DELETE], to listing, create, update and delete of Medias;
- /api/v1/media/{id} -> Route, [GET], to liting media by id;

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Developed with Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
