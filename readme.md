# Genevo Technology

## 1. How to install

##### Download Project

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

## 2. Backend Login
There are some users by default but for this tutorial I use admin user
url: http://localhost:8000/login
email: admin@gmail.com
password: easy

## 3. Page
For this version we need to create a new controller for the page. Example: HelloWorldController.php, HomeController.php, ...

## 4. Module

A module is a partial of a page. Example: Page home has several modules (slideshow, why should you trian with us, ...), and those we will add them to the page.
Module simply means page contents. So don't be messed up, just start create a hello world module.

##### Design table
My module has only a title and a text block so my table structure is

I name my table **module_hello_world**
 * id
 * title
 * content
 * created_at
 * updated_at
 
 ##### Create Module Model
 Create a Laravel model name it HelloWorld (/app/Modules/HelloWorld.php)
 
 ```
 <?php
 
 //This is name space that tells app that this model is a module model
 namespace App\Modules;
 
 use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Support\Facades\DB;
 
 class HelloWorld extends Authenticatable
 {
 
    /**
     * This is the name of the table for this model
     */
     protected $table = 'module_hello_world';
     
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'title', 'content'
     ];
 
    /**
     * This funtion returns all data that we need for view
     */
     public function viewData()
     {
         return DB::table($this->table)->first();
     }
 
 }

 ```
 Then open /app/PageModule.php to register module into application module. 
 
 ```
     protected $modulesMapping = [
         //this is default that I have added already
         'about-description' => 'App\Modules\AboutDescription',
         
         //this registers HelloWorld Class
         'hello-world' => 'App\Modules\HelloWorld'
     ];
 ```
 
 Next step, we need to choose what page are we going to add this module to. 
 
 -> go to backend -> Pages -> page you want to add module to -> edit -> drag and drop modules -> Update
 
 ![Mockup for feature A](https://raw.githubusercontent.com/thunder-phoenix/genevo-tech/master/docs/pages-manage.png)

### 