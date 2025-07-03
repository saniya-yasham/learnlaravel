<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function(){
    // return "<h1>This is Welcome Page</h1>";
    // return [1,2,3,5];

    return view('welcome');
});


