<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCourseController;
use App\Http\Controllers\CourseController;

Route::controller(CourseController::class)->group(function () {
    Route::get('courses', 'index');
    Route::post('courses', 'store');
    Route::get('courses/{course}', 'show');
    Route::put('courses/{course}', 'update');
    Route::delete('courses/{course}', 'destroy');
});
