<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
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

      $validatedData = $request->validate([
        'name' => 'required|min:10|max:50',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'discount_percent' => 'nullable|numeric|min:0|max:100',
        'rating' => 'nullable|numeric|min:0|max:5',
        'thumbnail' => 'nullable|url',
        'level' => 'required|string|in:beginner,intermediate,advanced', // Adjust based on your options
        'tags' => 'nullable|array',
        'tags' => 'string',
        'tutors' => 'nullable|array',
        'tutors' => 'string|exists:users,id', // Assuming tutors are user IDs
        'category_id' => 'required|exists:categories,id',
      ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
            'rating' => $request->rating,
            'thumbnail' => $request->thumbnail,
            'level' => $request->level,
            'tags' => $request->tags,
            'tutors' => $request->tutors,
            'category_id' => $request->category_id,
        ]);

        return  redirect()
        ->route('courses.create')
        ->with('course-saved','Data Saved Successfully!')
        ;




        // insert(); // multiple entries in single array
        // save(); // raw php method, fillable

        // create()
            // 1 - object
            // 2- data enter
            // 3. save()
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
