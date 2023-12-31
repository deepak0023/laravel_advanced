<?php

namespace Deepak0023\Todo;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider {

    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'todo');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/todo.php', 'todo');
        $this->publishes([
            __DIR__.'/config/todo.php' => config_path('todo.php'),
            __DIR__.'/views' => resource_path('views/vendor/todo'),
            __DIR__.'/database/migrations' => database_path('migrations')
        ]);
    }

    public function register() {

    }
}

?>
