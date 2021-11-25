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
- $ php artisan storage:link
- $ nano or vi .env

**Configure the database credentials in the .env file opened with the previous command, save and close file.**

- $ php artisan migrate
- $ php artisan db:seed --class=UserSeeder
- $ php artisan serve

## Endpoints

- [**POST ->** /api/v1/story ] - Endpoint where a story is registered.
   - **DATE**:
     - **title** | string
     - **body** | text
     - **is_enabled** | boolean
     - **created_at** | datetime
     - **updated_at** | datetime
- [**GET ->** /api/v1/story ] - Endpoint for listing these stories, sorted in descending order of registration (newest to oldest);
- [**GET ->** /api/v1/story/{story_id} ] - Endpoint to list a single tale by its id;
- [**PUT ->** /api/v1/story/{story_id} ] - Endpoint to edit a single story through its id;
- [**DELETE ->** /api/v1/story/{story_id} ] - Endpoint to delete a story by its id.
- [**POST ->** /api/v1/media ] - Endpoint where it will be possible to upload a video, music or image with a maximum size of 5MB
- [**GET ->** /api/v1/media/story/{story_id} ] - Endpoint where, when passing the tale id, return the linked media url
- [**DELETE ->** /api/v1/media/{media_id} ] - Endpoint where you can delete a media related to a user.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Developed with Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Fase 1 - Contos

<p align="center"><a href="https://github.com/nextalebr/desafio-backend" target="_blank">https://github.com/nextalebr/desafio-backend</a></p>

- [**POST ->** /api/v1/story ] - Endpoint onde é cadastrado um conto.
  - **DATA**:
    - **title** | string
    - **body** | text
    - **is_enabled** | boolean
    - **created_at** | datetime
    - **updated_at** | datetime
- [**GET ->** /api/v1/story ] - Endpoint para listagem desses contos, ordernados por ordem de cadastro decrescente (mais novo para mais antigo);
- [**GET ->** /api/v1/story/{story_id} ] - Endpoint para listar um único conto através do seu id;
- [**PUT ->** /api/v1/story/{story_id} ] - Endpoint para editar um único conto através do seu id;
- [**DELETE ->** /api/v1/story/{story_id} ] - Endpoint para excluir um conto através do seu id.
- 
### Fase 2 - Midias

- [**POST ->** /api/v1/media ] - Endpoint onde será possível realizar um upload de um vídeo, música ou imagem com tamanho máximo de 5MB
- [**GET ->** /api/v1/media/story/{story_id} ] - Endpoint onde ao passar o id do conto retorne a url das mídias vinculadas
- [**DELETE ->** /api/v1/media/{media_id} ] - Endpoint onde seja possível excluir uma mídia relacionada a um usuário.
