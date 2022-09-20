## About this application
The application goal is to demonstrate how to use maatwebsite/excel to export data from laravel application to excel file. You can export all customer records or filter them before export.

## Installation and configuration
- Clone this repository
```
git clone https://github.com/mycoding-academy/laravel-export-demo.git
```
- Change directory to project folder
```
cd laravel-export-demo
```
- Copy .env.example to .env
```
cp .env.example .env
```
- Install packages
PHP packages
```
composer install
```
Node packages
```
npm install
```
Built assest
```
npm run built
```
- Create database and use your preferred editor to configure your data in .env file.
- Generat application key
```
php artisan key:generate
```
- Migrate database
```
php artisan migrate
```
- Run the application and your application can be accessed from http://localhost:8000
Run Vite asset builder and auto refresh page (if you change your assets)
```
npm run dev
```
Run local web server
```
php artisan serve
```
- Generate example data using seeder by run Customer Seeder (Only customer data) OR Database Seeder (all seeder if any).
Run only customer seeder.
```
php artisan db:seed --class=CustomerSeeder
```
Or run all database seeder.
```
php artisan db:seed
```

- Register your first user using application's register link.
- Login to the application and go to https://localhost:8000/customers and try .....

I didnot add Customers menu yet so use the direct link.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
