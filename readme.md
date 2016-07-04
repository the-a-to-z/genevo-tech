# Genevo Technology

## 1. How to install

Open terminal or gitbash and navigate to your project directory. Then run command
```
git clone https://github.com/thunder-phoenix/genevo-tech.git
```
or
```
git clone https://github.com/thunder-phoenix/genevo-tech.git project-name
```

Import database into your database server or database development (wamp, xampp, ...). You can name database whatever you want and you think it's good name for the project database.

##### Configure Laravel
Open .env file and change to your development environment. The information bellow is my configuration environment.

```
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=genevo_tech_v2
DB_USERNAME=root
DB_PASSWORD=P@ssw0rd
```

open command line and type

```
php artisan serve
```

Command above is to run laravel and it uses localhost:8000 by default. Once you have run the command, you can open browser and open http://localhost:8000 . 

## 1. Module

A module is a partial of a page. Page home has several modules (slideshow, why should you trian with us, ...), and those we will add them to the page.

### 