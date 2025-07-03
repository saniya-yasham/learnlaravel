<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    // return "<h1>This is Welcome Page</h1>";
    // return [1,2,3,5];

    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
