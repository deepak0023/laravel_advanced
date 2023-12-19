<?php

use Illuminate\Support\Facades\Route;
use App\Events\UserRegistration;
use App\Jobs\TestJob;
use App\Models\User;
use App\Jobs\TestJob2;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Bus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userreg', function () {
    return view('userregistration');
});

Route::post('/userreg', function () {

    $name = request()->input('name');

    event(new UserRegistration($name));

    return view('userregistration');
});


Route::get('/test-queue', function() {
    // dispatch(function() {
    //     logger("test123");
    // });
    //->delay(now()->addMinutes(2));

    // $user = User::first();
    // dispatch(new TestJob($user));
    // TestJob::dispatch($user)->onQueue('default');
    // TestJob2::dispatch()->onQueue('high');

    // app(Pipeline::class)
    // ->send('hello world')
    // ->through([
    //     function($string, $next) {
    //         return $next(ucwords($string));
    //     },
    //     function($string, $next) {
    //         return $next($string. ": passed pipe 2");
    //     },
    //     TestJob2::class
    // ])->then(function($string) {
    //     dump($string);
    // });


    $chain = [
        new App\Jobs\TestJob3(),
        new App\Jobs\TestJob4()
    ];

    Bus::chain($chain)->dispatch();


    dd("done");
});
