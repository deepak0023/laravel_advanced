<?php

Route::get('/test-package', function() {
    dd("this is a test package");
});

Route::get('/todo', function() {
    return view('todo::todo');
});

?>
