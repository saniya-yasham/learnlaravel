<?php

namespace App\Http\Controllers;

use App\Jobs\CourseCreateJob;
use App\Models\Category;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCourseController extends Controller
{

    use \App\Traits\CourseTrait;

    public function index(Request $request)
    {
        $courses = $this->course_Index($request);

        return response()->json($courses);
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

            return response()->json(['message' => 'Course created', 'data' => $course, 'status' => true], 201);
        } catch (\Exception $e) {
            Log::error("Course creation failed: " . $e->getMessage());

            return response()->json(['message' => 'Course creation Failed' .  $e->getMessage(), 'status' => false], $e->getCode() ?: 500);
        }
    }

    public function show(Request $request, Course $course)
    {
        return response()->json($course);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $this->validateData($request);

        try {
            $course->update($validated);

            return response()->json(['message' => 'Course Updated', 'data' => $course, 'status' => true]);
        } catch (\Exception $e) {
            Log::error("Course update failed: " . $e->getMessage());

            return response()->json(['message' => 'Course updation Failed' .  $e->getMessage(), 'status' => false]);
        }
    }

    public function destroy(Request $request, Course $course)
    {
        try {
            $course->delete();

            return response()->json(['message' => 'Course Deletion success', 'status' => true]);
        } catch (\Exception $e) {
            Log::error("Course delete failed: " . $e->getMessage());

            return response()->json(['message' => 'Course deletion Failed' .  $e->getMessage(), 'status' => false]);
        }
    }

    public function payment()
    {
        //Start payment process
        //Payment logic
        // Payment completed

        return "Payment Process Started";
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
