<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Http\Request;

// Request = GET "/contact"
// Singular = Course, PascalCase, concat Controller

// /* ----------------------------------------------------------------------- Resource Route ---------------------------------------------------------------------- */
// //Store data in the db //create
// // Route Model Binding
// Route::post('/courses',  [CourseController::class, 'store']);
// // show //read
// Route::get('/courses/{course}', [CourseController::class, 'show']);
// // Update
// Route::put('/courses/{course}',  [CourseController::class, 'update']);
// // Delete
// Route::delete('/courses/{course}',  [CourseController::class, 'delete']);
// /* ----------------------------------------------------------------------- x ---------------------------------------------------------------------- */

// // Index
// Route::get('/', [CourseController::class, 'index']);
// //Create - show create  form
// Route::get('/courses/create',  [CourseController::class, 'create']);
// // Edit data - show edit form
// Route::get('/courses/edit/{id}',  [CourseController::class, 'edit']);


// Resource Routes
Route::controller(CourseController::class)->group(function () {
    Route::post('/courses', 'store');
    Route::get('/courses/{course}', 'show');
    Route::put('/courses/{course}', 'update');
    Route::delete('/courses/{course}', 'delete');
    Route::get('/',  'index');
    Route::get('/courses/create', 'create');
    Route::get('/courses/edit/{id}', 'edit');
});

// Route::resource('courses', CourseController::class);


// Route::get('/welcome', function(){
//     return view('welcome';)
// })

// Route:view('/welcome', 'welcome');