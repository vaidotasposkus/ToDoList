<?php

namespace Whylab\Todolist;

use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Whylab\Todolist\Http\Controllers\TaskController');
        $this->mergeConfigFrom(__DIR__.'/config/todo.php', 'todolist');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views/whylab/todolist', 'todolist');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang/whylab/todolist', 'todolist');

        $this->publishes([
            __DIR__.'/resources/views/whylab/todolist' => resource_path('views/vendor/todolist'),
            __DIR__.'/resources/lang/whylab/todolist' => resource_path('lang/vendor/todolist'),
        ], 'todolist');

        $this->publishes([
            __DIR__.'/config/todo.php' => config_path('todo.php'),
        ],'config');
    }
}
