# About YouVideo WebApp

Welcome to the YouVideo WebApp development repository!

* [Getting Started](#getting-started)
* [Credentials](#credentials)

## Getting Started

YouVideo WebApp is the front-end, communicating with the `api` and rendering the information for the user, developed with the PHP Framework Laravel, Blade templating engine, JavaScript framework Vue.js and Boostrap framework. In this way, for the web application to work correctly, the API must be running.

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

After that, first access the WebApp folder `cd webapp` and run the following commands:

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
docker exec -it webapp-laravel.test-1 bash
```

When accessing the container, generate your application encryption key using:

```
php artisan key:generate
```

And install the dependencies by running the command:

```
composer install
```

```
npm install
```

Still inside the container, you can consult the list of routes using the command:

```
php artisan route:list
```

The YouVideo WebApp will be accessible at http://localhost:3000/. 

To stop Docker containers, run the command:

```
./vendor/bin/sail down
```

## Credentials

To see all environment variables, access the .env file in the root of the WebApp project. These are the default environment credentials of YouVideo WebApp:

* APP port: `3000`
* API port: `8080`
