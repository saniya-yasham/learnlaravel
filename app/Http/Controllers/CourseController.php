<?php

namespace App\Http\Controllers;

use App\Jobs\CourseCreateJob;
use App\Mail\CourseCreated;
use App\Models\Category;
use App\Models\Course;
use App\Services\CourseService;
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

    // protected $obj;
    // public function __construct()
    // {
    //     $this->obj = new CourseService();
    // }

    public function __construct(protected CourseService $courseService) {}


    public function index(Request $request)
    {
        $query = Course::with('category');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(10)->withQueryString();


        // if (request()->wantsJson()) {
        //     return response()->json([
        //         'status' => true,
        //         'data' => $courses,
        //     ]);
        // } else {
        //     return view('home', compact('courses'));
        // }

        if (request()->is('api/*')) {
            return response()->json([
                'status' => true,
                'data' => $courses,
            ]);
        } else {
            return view('home', compact('courses'));
        }
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




            // $obj = new \App\Services\CourseService();
            // $obj->postStoreLogic();


            // (new CourseService())->postStoreLogic();


            //service
            $this->courseService->postStoreLogic();


            CourseCreateJob::dispatch($course);
            return redirect()->route('course.create')->with('course-saved', 'Data Saved Successfully!');
        } catch (\Exception $e) {

            Log::error("Course creation failed: " . $e->getMessage());
            return redirect()->route('course.create')->with('course-error', 'Please try again!');
        }
    }

    public function show(Request $request, Course $course)
    {

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

            return redirect('/')->with('course-updated', 'Course updated successfully!');
        } catch (\Exception $e) {
            Log::error("Course update failed: " . $e->getMessage());

            return redirect()->back()->with('course-error', 'Please try again!');
        }
    }

    public function destroy(Request $request, Course $course)
    {
        try {
            $course->delete();

            return redirect('/')->with('course-deleted', 'Course deleted successfully!');
        } catch (\Exception $e) {
            Log::error("Course delete failed: " . $e->getMessage());

            return redirect('/')->with('course-error', 'Please try again!');
        }
    }
}
