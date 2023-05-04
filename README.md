# CoronaTime Application
CoronaTime helps people get the information about worldwide information of coronavirus new cases, deaths and recovered people. user can also see statistics by country. user can search country or sort it with location, new cases, deaths and recovered data. There is also registration, email confirmation, login, password reset and email for password reset link.


## Table of Contents
- [Prequisites](##Prequisites)
- [Tech Stack](##Tech-stack)
- [Getting Started](##Getting-Started)
- [Getting Started](##Getting-Started)
- [Migration](##Migration)
- [Development](##Development)
- [MYSQL Structure](##MYSQL-Structure)
- [Project Structure](##Project-Structure)

## Prequisites
 - PHP@7.2 and up
- MYSQL@8 and up
- npm@6 and up
-  composer@2 and up

## Tech Stack 
-  [Laravel@9.x](https://laravel.com/docs/9.x) - back-end framework
- [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation

## Getting Started
1.  First of all you need to clone CoronaTime repository from github:
```
git clone https://github.com/RedberryInternship/nugzar-rostiashvili-corona-time.git
```
2. Next step requires you to run composer install in order to install all the dependencies.
```
composer install
```
3. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```
npm install
```
and also: 
```
npm run dev
```
4. Now we need to set our env file. Go to the root of your project and execute this command.
```
cp .env.example .env
```
And now you should provide .env file all the necessary environment variables:

MYSQL:
```
DB_CONNECTION=mysql
```

```
DB_HOST=127.0.0.1
```

```
DB_PORT=3306
```

```
DB_DATABASE=*****
```

```
DB_USERNAME=*****
```

```
DB_PASSWORD=*****
```
after setting up .env file, execute:
```
php artisan config:cache
```

## Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```
php artisan migrate
```
## Running Feature tests
```
php artisan test
```

## Development
You can run Laravel's built-in development server by executing
```
php artisan serve
```
when working on JS you may run:
```
npm run dev
```
## MYSQL Structure
![alt text](https://i.ibb.co/W000F7H/corona-time-drawsql.png)

-  [DrawSQL](https://drawsql.app/teams/nugos-team/diagrams/corona-time)

## Project Structure 
```
├─── app
│   ├─── Console
│   ├─── Enums
│   ├─── Exceptions
│   ├─── Http
│   ├─── Models
|   ├─── Providers
├─── bootstrap
├─── config
├─── database
├─── lang
├─── node_modules
├─── public
├─── resources
├─── routes
├─── storage
├─── tests
- .env
- artisan
- composer.json
- package.json
- phpunit.xml
- tailwind.config.js
- vite.config.js
```