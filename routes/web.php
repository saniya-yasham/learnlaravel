<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Request = GET "/contact"
// Singular = Course, PascalCase, concat Controller 
Route::get(
    '/',
    [CourseController::class, 'index' ]   
);
