# Laravel Simple Todo List
- [Laravel-TodoList on Packagist](https://packagist.org/packages/whylab/todolist)
- [Laravel-TodoList on GitHub](https://github.com/vaipos/ToDoList)

A simple Laravel Todo List Package.

<a name="quickstart">Quickstart</a>
--------
To get started, you simply need to run:

    $ composer require whylab/todolist
    
This will install the package.

Once TodoList is installed you need to register the service provider with the application. Open up 
`app/config/app.php` and find the `providers` key.

~~~php
<?php

'providers' => [

    Whylab\Todolist\TodolistServiceProvider::class,

]
~~~

You have to run migrations Afterwards:

    $ php artisan migrate
    
This will create necessary tables inside the database.

And you're good to Go.

Just point to `/todo` route and See it works.

<a name="customization">Customize Package</a>
-----

Build our own TodoList package application where you can customize module by your self using laravel php artisan 
command.

Create your the configuration file using laravel artisan comman.

~~~
$ php artisan vendor:publish --provider="Whylab\Todolist\TodolistServiceProvider" --tag=config
~~~

Customize views and use multilanguage in todolist package. Using laravel artisan command you can create files where 
you can customize package.

~~~
$ php artisan vendor:publish --provider="Whylab\Todolist\TodolistServiceProvider" --tag=todolist
~~~