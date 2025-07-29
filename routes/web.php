<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Gate::authorize('edit-delete-course', $course);
//some changes
// another changes

Route::controller(CourseController::class)->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/courses/create', 'create')->name('course.create');
        Route::post('/courses', 'store')->name('course.store');
        Route::get('/courses/edit/{course}', 'edit')->name('course.edit')->can('edit-delete-course', 'course');
        Route::put('/courses/{course}', 'update')->name('course.update')->can('edit-delete-course', 'course');
        Route::delete('/courses/{course}', 'destroy')->name('course.destroy')->can('edit-delete-course', 'course');
    });

    Route::get('/courses/{course}', 'show')->name('course.show');
    Route::get('/',  'index')->name('course.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// /* ----------------------------------------------------------------------- x ---------------------------------------------------------------------- */
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
// /* ----------------------------------------------------------------------- x ---------------------------------------------------------------------- */

// Route::view('/courses/create', 'courses.create');
// /* ----------------------------------------------------------------------- x ---------------------------------------------------------------------- */

// Resource Routes
// Route::controller(CourseController::class)->group(function () {
//     Route::get('/courses/create', 'create');
//     Route::post('/courses', 'store');
//     Route::get('/courses/{course}', 'show');
//     Route::put('/courses/{course}', 'update');
//     Route::delete('/courses/{course}', 'delete');
//     Route::get('/',  'index');
//     Route::get('/courses/edit/{id}', 'edit');
// });
// /* ----------------------------------------------------------------------- x ---------------------------------------------------------------------- */

// Route::resource('courses', CourseController::class);
