# About YouVideo API

Welcome to the YouVideo API development repository!

* [Getting Started](#getting-started)
* [Credentials](#credentials)

## Getting Started

YouVideo API is the RESTful API responsible for the YouVideo backend, video sharing platform, developed with the PHP Laravel framework, Eloquent ORM, MySQL database.

A local development environment is available to quickly get up and running. You will need a basic understanding of how to use the command line on your computer. This will allow you to set up the local development environment, to start it and stop it when necessary, and to run the tests.

You will also need Docker installed and running on your computer. Docker is the virtualization software that powers the local development environment. Docker can be installed just like any other regular application.

### Development Environment Commands

Ensure [Docker](https://www.docker.com/products/docker-desktop) is running before using these commands.

#### To start the development environment for the first time

Clone the current repository using:

```
git clone https://github.com/douglasfelc/desafio-erural.git
```

Then in your terminal move to the repository folder `cd desafio-erural`.

After that, first access the API folder `cd api` and run the following commands:

Configure your environment variables file.

On Linux and Mac:

```
cp .env.example .env
```

On Windows:

```
copy .env.example .env
```

#### To build and start using [Docker Compose](https://docs.docker.com/compose/reference/) and [Sail](https://laravel.com/docs/8.x/sail)

```
./vendor/bin/sail up -d
```

Access the container by running the command:

```
docker exec -it api-laravel.test-1 bash
```

When accessing the container, install the dependencies by running the command:

```
composer install
```

And perform the migrations by running the command:

```
php artisan migrate
```

Still inside the container, you can consult the list of routes using the command:

```
php artisan route:list
```

The YouVideo API will be accessible at http://localhost:8080/. 

To stop Docker containers, run the command:

```
./vendor/bin/sail down
```

## Credentials

To see all environment variables, access the .env file in the root of the API project. These are the default environment credentials of YouVideo API:

* API port: `8080`
* Database connection: `mysql`
* Database Host: `mysql`
* Database Port: `3306`
* Database Name: `video`
* Database Username: `sail`
* Database Password: `password`
