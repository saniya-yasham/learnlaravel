<?php

namespace App\Jobs;

use App\Mail\CourseCreated;
use App\Models\Course;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CourseCreateJob implements ShouldQueue
{
    use Queueable;
    public $course;

    /**
     * Create a new job instance.
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        //pdf generate code
        // promotional image attachment code

        Log::info("CourseCreateJob started");
        Mail::to('saniya.yasham@gmail.com')->send(new CourseCreated($this->course));

    }
}
