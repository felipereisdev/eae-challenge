
# EAE Challenge

A Basic jobs app for developers, consuming an api in laravel and with frontend in react.


## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)


## Techs

* [Laravel](https://laravel.com/)
* [React](https://git-scm.com/)
* [Typescript](https://www.typescriptlang.org/)
* [Tailwind](https://tailwindcss.com/)
* [Laravel Sail](https://laravel.com/docs/9.x/sail)
* [MySQL](https://www.mysql.com/)

## Requirements

* [Git](https://git-scm.com/)
* [Composer](https://git-scm.com/)
* [PHP 8.1](https://www.php.net/)
* [Docker](https://www.docker.com/)

## Installation

```console
git clone https://github.com/felipereisdev/eae-challenge.git

cd eae-challenge

composer install (installation of dependencies)

duplicate .env.example and rename the new file to .env

./vendor/bin/sail up (up php and mysql server)

create database if not exists (check credentials in .env file)

./vendor/bin/sail composer app-setup (script to up migration, seeder and others)

if you don't changed app port in docker-compose.yml, access http://localhost:8888

```
## Authors

- [@felipereisdev](https://www.linkedin.com/in/felipereisdev/)


## License

[MIT](https://choosealicense.com/licenses/mit/)

