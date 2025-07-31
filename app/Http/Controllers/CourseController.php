<?php

namespace App\Http\Controllers;

use App\Mail\CourseCreated;
use App\Models\Course;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        Log::info("index function started");
        // $courses = Course::all(); // lazy loading

        // I have added some code

        // eager loading
        $courses = Course::with('category')->paginate(10);
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

        try{
            //code = if all lines of the code ran successfully then only move forward
            Course::create($validatedData); //shortcut
            Mail::to(auth()->email)->send(new CourseCreated());
        }
        catch(Exception $error){
            Log::info("some error occued during creation of course" . $error);
        }


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

    public function edit(Course $course)
    {
        // Gate::authorize('edit-delete-course', $course); //abort(403)

        // if (Gate::allows('edit-delete-course', $course)) {
        //     dd("You are authorized to do this job");
        // };

        // if (Gate::denies('edit-delete-course', $course)) {
        //     return redirect()
        //         ->route('course.index')
        //         ->with('unauthorized', 'Please edit the course you have created');
        // }; //abort(403)


        //   allows =  if authorize = continue to next line
        //   denies =  if not authorized = 403 error

        return view('courses.edit', compact('course'));
    }

    // Route model binding
    // dependency injection
    public function update(Request $request, Course $course)
    {
        // Gate::authorize('edit-delete-course', $course); //abort(403)

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

    public function destroy(Course $course)
    {
        // Gate::authorize('edit-delete-course', $course); //abort(403)

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
