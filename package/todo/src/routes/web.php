<?php

use Illuminate\Http\Request;

Route::get('/test-package', function() {
    dd("this is a test package");
});

Route::group(['namespace' => 'Deepak0023\Todo\Http\Controllers'], function() {
    Route::get('/todo', 'TodoController@index')->name('todo');
    Route::post('/todo', 'TodoController@create');
});



?>
