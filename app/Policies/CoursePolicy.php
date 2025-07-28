<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function edit_delete_course(User $user, Course $course){
        return $course->user_id === $user->id;
    }



    
}
