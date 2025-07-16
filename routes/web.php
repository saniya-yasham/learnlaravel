<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Request = GET "/contact"
// Singular = Course, PascalCase, concat Controller
Route::get(
    '/',
    [CourseController::class, 'index']
);

Route::get('/courses/create',  [CourseController::class, 'create'])
->name('courses.create');


Route::post('/course/store', [CourseController::class, 'store']);
