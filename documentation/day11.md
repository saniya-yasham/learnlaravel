# Laravel Job – Simple Example (Logging a Message)

---

## ✅ Step 1: Create the Job

```bash
php artisan make:job LogCourseCreated
```

---

## ✅ Step 2: Write Simple Logic in the Job

```php
// app/Jobs/LogCourseCreated.php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LogCourseCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $courseName;

    public function __construct($courseName)
    {
        $this->courseName = $courseName;
    }

    public function handle(): void
    {
        Log::info("Course created: " . $this->courseName);
    }
}
```

---

## ✅ Step 3: Dispatch the Job from Controller

```php
use App\Jobs\LogCourseCreated;

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required'
    ]);

    Course::create($data);

    LogCourseCreated::dispatch($data['name']);

    return back();
}
```

---

## ✅ Step 4: Start the Worker

```bash
php artisan queue:work
```

Now whenever a course is created, the message will be logged **asynchronously**.

---

## ✅ You Can Also Delay It

```php
LogCourseCreated::dispatch('Test Course')->delay(now()->addMinutes(2));
```

---

## 🧠 Why Use This?

- Teaches the **Job lifecycle**
- Good for demo/testing
- Can replace `Log::info()` with:
  - API call
  - Data processing
  - File storage
  - Slack message
