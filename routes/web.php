<?php

use App\Events\UserRegistration;
use App\Jobs\TestJob;
use App\Jobs\TestJob2;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;

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

app()->bind('Hello', function() {
    return "Hello";
});

dump(app()->make("Hello"));

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

Route::get('/test-queue', function () {
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

    // $batch = [
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ],
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ]
    // ];

    // Bus::batch($batch)
    // ->onQueue('high')
    // ->onConnection('redis')
    // ->allowFailures()  // allow failures so that other jobs could be run [opposite of if($this->batch()->cancelled())]
    // ->catch(function($batch, $e) {
    //     logger('-----------------------------------------------');
    //     info('catched exception');
    //     logger($e);
    //     logger($batch);
    //     logger('-----------------------------------------------');
    // })
    // ->finally(function() {    // runs after all jobs are excuted successfully
    //     info('got into finally block');
    // })
    // ->then(function() {    // runs after all jobs are excuted successfully
    //     info('all jobs executed successfully');
    // })
    // ->dispatch();

    // $parallel_batch = [
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ],
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ]
    // ];

    // Bus::chain([
    //     new App\Jobs\TestJob5(),
    //     function() use ($parallel_batch) {
    //         Bus::batch($parallel_batch)->dispatch();
    //     }
    // ])->dispatch();

    App\Jobs\TestJob3::dispatch();

    dd('done');
});

Route::get('/test', function () {
    dd(storage_path('app/test.txt'));
});
