<?php

use Illuminate\Support\Facades\Route;
use App\Events\UserRegistration;
use App\Jobs\TestJob;
use App\Models\User;

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

    $user = User::first();
    dispatch(new TestJob($user));
    dd("done");
});
