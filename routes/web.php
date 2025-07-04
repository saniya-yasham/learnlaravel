<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    //controller
    function () {

        //model
        $courses = [
            [
                'name' => "Web development"
            ],
            [
                'name' => "Python"
            ],

        ];

        //view
        return view('home', ['data' => $courses]);
    }
);
