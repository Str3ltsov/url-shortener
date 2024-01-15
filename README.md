# Url Shortener

The purpose of this webpage is to take any full URL and generate a short version of it.

This project was built using Laravel, InertiaJS, and VueJS for a task in one company's hiring process.


## Setup process

### Prerequisites.
- PHP
- Composer
- XAMPP / LAMP / WAMP

### Setup
1. First clone or download the project.
```
git clone https://github.com/Str3ltsov/url-shortener.git
```
2. Install all of the PHP dependencies.
```
composer install
```
Note: If you run into any errors during the install process. Run:
```
composer update
```
3. Generate an app encryption key.
```
php artisan key:generate
```
4. Create a database for your project.
5. Enter your database credentials in the .env file to connect.
```
DB_HOST=127.0.0.1 
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_userpassword
```
6. Migrate the database.
```
php artisan migrate
```
7. Install all of the JavaScript dependencies.
```
npm install
```
8. Compile the project.
```
npm run dev
```
9. After the project compiles, you may finally run it.
```
php artisan serve
```
