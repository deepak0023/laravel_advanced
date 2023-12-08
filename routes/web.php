<?php

use Illuminate\Support\Facades\Route;
use App\Events\UserRegistration;

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

