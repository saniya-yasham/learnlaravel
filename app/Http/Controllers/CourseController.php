<?php

namespace App\Http\Controllers;

use App\Jobs\CourseCreateJob;
use App\Mail\CourseCreated;
use App\Models\Category;
use App\Models\Course;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class CourseController extends Controller
{

    // service
    // stateless auth, token based auth 
    // api reuse..
    // pivot table

    use \App\Traits\CourseTrait;

    public function payment()
    {
        $this->paymentTrait();
    }

    public function index(Request $request)
    {
        $courses = $this->course_Index($request);
        return view('home', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        try {
            $course = Course::create([
                'name' => $validated['name'],
                'user_id' => auth()->id() ?? 1, // fallback if no auth
            ]);

            CourseCreateJob::dispatch($course);

            if ($request->wantsJson()) {
                return response()->json(['message' => 'Course created', 'data' => $course], 201);
            }

            return redirect()->route('course.create')->with('course-saved', 'Data Saved Successfully!');
        } catch (\Exception $e) {
            Log::error("Course creation failed: " . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json(['error' => 'Failed to create course'], 500);
            }

            return redirect()->route('course.create')->with('course-error', 'Please try again!');
        }
    }

    public function show(Request $request, Course $course)
    {
        if ($request->wantsJson()) {
            return response()->json($course);
        }

        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $this->validateData($request);

        try {
            $course->update($validated);

            if ($request->wantsJson()) {
                return response()->json(['message' => 'Course updated', 'data' => $course]);
            }

            return redirect('/')->with('course-updated', 'Course updated successfully!');
        } catch (\Exception $e) {
            Log::error("Course update failed: " . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json(['error' => 'Failed to update course'], 500);
            }

            return redirect()->back()->with('course-error', 'Please try again!');
        }
    }

    public function destroy(Request $request, Course $course)
    {
        try {
            $course->delete();

            if ($request->wantsJson()) {
                return response()->json(['message' => 'Course deleted']);
            }

            return redirect('/')->with('course-deleted', 'Course deleted successfully!');
        } catch (\Exception $e) {
            Log::error("Course delete failed: " . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json(['error' => 'Failed to delete course'], 500);
            }

            return redirect('/')->with('course-error', 'Please try again!');
        }
    }

    protected function validateData(Request $request)
    {
        return $request->validate(
            [
                'name' => 'required|min:10|max:50',
            ],
            [
                'name.required' => "This is my custom required message",
                'name.min' => "This is my custom min message",
            ]
        );
    }
}
