<!-- TODO: Complete the description and about the appropriate license. -->
# Workshop

Documents management application based on Laravel and Bootstrap. Includes the following integrations:

- Mailchimp newsletter subscription
- Sendgrid email marketing
- Cloudinary assets upload

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites :clipboard:

The programs you need are:

-   [Composer](https://getcomposer.org/download/).
-   [Node.js](https://nodejs.org/en/download/).
-   Database and a web server with PHP.

### Installing 🔧

Duplicate the file .env.example as .env and set your credential for the database in.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

Then install the PHP packages.

```
composer install
```

Generate the application key.

```
php artisan key:generate
```

Then install the JavaScript packages with npm.

```
npm install
```

Finally generate the database with fake data:

```
php artisan migrate --seed
```

## Running the project :computer:

First generate the public files with

```
npm run dev
```

Note: Each time SASS and JavaScript files are updated you need to run the past command, to make it easier run:

```
npm run watch
```

Finally run the serve

```
php artisan serve
```

## Deployment 📦

To deploy the project you need extra configurations for optimization and security as:

Generate optimized JavaScript files.

```
npm run production
```

Set in the file .env the next configuration.

```
APP_ENV=production
```

## Built With 🛠️

-   [Laravel 8.0](https://laravel.com/docs/8.x/) - Framework PHP.

## Authors

-   Daniel Gonzalez - _Initial work_ [ogonzalez29](https://github.com/ogonzalez29)
-   Martín Campos - _Contributor_ [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/ogonzalez29/workshop/issues) and/or [pull requests](https://github.com/ogonzalez29/workshop/pulls).
