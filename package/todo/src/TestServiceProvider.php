<?php

namespace Deepak0023\Todo;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider {

    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register() {

    }
}

?>
