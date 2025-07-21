<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Http\Request;

// Request = GET "/contact"
// Singular = Course, PascalCase, concat Controller

// Index
Route::get(
    '/',
    function () {
        $courses = Course::with('category')->paginate(2);
        return view('home', compact('courses'));
    }
);

//Create - show create  form
Route::get('/course/create',  function () {
    $categories  = \App\Models\Category::all();
    return view('courses.create', compact('categories'));
});


//Store data in the db
Route::post('/course/store', function (Request $request) {
    $validatedData = $request->validate(
        [
            'name' => 'required|min:10|max:50',
        ],
        [
            'name.required' => "This is my custom required message",
            'name.min' => "This is my custom min message",

        ]
    );

    Course::create($validatedData); //shortcut

    return  redirect()
        ->route('courses.create')
        ->with('course-saved', 'Data Saved Successfully!')
    ;
});


// Edit data - show edit form
Route::get('/course/edit/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('courses.edit', compact('course'));
});

// Update
Route::put('/course/update/{id}', function (Request $request, $id) {

    $course = Course::findOrFail($id);

    $validatedData = $request->validate(
        [
            'name' => 'required|min:10|max:50',
        ],
        [
            'name.required' => "This is my custom required message",
            'name.min' => "This is my custom min message",

        ]
    );

    $course->update($validatedData);
    return redirect('/');
});

// Delete
Route::delete('/course/delete/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();
    return redirect('/');
});
