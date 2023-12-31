<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Repositories\BikeRepository;
use App\Repositories\FishRepository;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind('Hello', function() {
            return "Hello";
        });

        app()->bind('Fish', function($app) {
            return new FishRepository;
        });

        app()->bind('Bike', function() {
            return new BikeRepository;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
