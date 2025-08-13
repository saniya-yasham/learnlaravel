<?php

namespace App\Traits;

use App\Models\Course;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

trait CourseTrait
{
    public function course_Index(Request $request)
    {
        $query = Course::with('category');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(10)->withQueryString();
        return $courses;
    }
}
