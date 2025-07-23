<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        // $courses = Course::all(); // lazy loading

        // I have added some code

        // eager loading
        $courses = Course::with('category')->paginate(2);
        // HW: types of pagination , when to use what


        return view('home', compact('courses'));
        // return view('home', ['courses' => $courses]);
    }

    public function create()
    {
        $categories  = \App\Models\Category::all();
        return view('courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
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

        // validate()
        // 1- if validation passes = continue to next line
        // 2- if validation fails 
        //         $error[] = stores all errors with validation messages
        //         old() = store users input data
        //         redirects = redirect back to the form page

        // $request ,  $validatedData



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

        // Course::create([
        //     // 'name' => $request->name,
        //     'name' => $validatedData['name'], //recommended
        // ]);



        return  redirect()
            ->route('courses.create')
            ->with('course-saved', 'Data Saved Successfully!')
        ;


        // insert(); // multiple entries in single array
        // save(); // raw php method, fillable

        // create()
        // 1 - object
        // 2- data enter
        // 3. save()
    }

    public function show(Course $course)
    {
        // $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    // Route model binding
    // dependency injection
    public function update(Request $request, Course $course)
    {
        // $course = Course::findOrFail($id);

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
    }

    public function delete(Course $course)
    {
        // $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/');
    }
}


    // Session

    // Flash                   Normal
    // temporary
    // 1 request only          multiple
    // 2nd reuest -            manually data delete
    // old delete

    // page refresh-
    // old delete
