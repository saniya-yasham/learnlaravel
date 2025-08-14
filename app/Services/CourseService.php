<?php

namespace App\Services;
use Razorpay\Api\ApiException;

use Illuminate\Support\Facades\Log;

class CourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function postStoreLogic()
    {
        Log::info("Course created: ");
        Log::info("Mail to user: ");
        Log::info("Mail to admin: ");
    }
}
