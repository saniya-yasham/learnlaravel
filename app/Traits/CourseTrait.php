<?php

namespace App\Traits;

use App\Models\Course;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

trait CourseTrait
{
    public function courseIndex(Request $request)
    {
        $query = Course::with('category');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(10)->withQueryString();
        return $courses;
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
