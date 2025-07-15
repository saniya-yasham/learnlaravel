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
        return view('courses.create');
    }

    public function store(Request $request)
    {
        
    }
}
