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

        app()->bind('Fish', function($app, $paramters) {
            // dd($paramters);  // getting all paramters in array format
            return new FishRepository($paramters);
        });

        app()->bind('Bike', function($app, $paramters) {
            return new BikeRepository($paramters);
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
