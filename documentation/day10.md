# Laravel 12 – Mail & Queue Teaching Script

---

## ✅ Step 1: Create Mail Class

```bash
php artisan make:mail CourseCreated --markdown=mail.course-created
```

---

## ✅ Step 2: Preview Email in Browser

```php
// routes/web.php
Route::get('testmail', function () {
    return new App\Mail\CourseCreated();
});
```

- Shows the email content in browser for design/testing.

---

## ✅ Step 3: Send Actual Email

```php
Route::get('testmail', function () {
    Mail::to('user1@gmail.com')->send(
        new App\Mail\CourseCreated()
    );
});
```

---

## ✅ Step 4: Send Email When Course is Created

In `CourseController@store`:

```php
Mail::to(Auth::user()->email)->send(
    new CourseCreated()
);
```

---

## ✅ Step 5: Add try–catch Block to Handle Errors

- Exception: The generic base class. Use when you want to catch any exception.
- PDOException: For database errors when using PDO.
- ErrorException: For errors converted to exceptions.
- Throwable: Catches both Exception and Error (since PHP 7).

- Example usage:

    ```php
    try {
            Course::create($data);
            Mail::to(Auth::user()->email)->send(new CourseCreated());
    } catch (Exception $e) {
            Log::error("Mail or DB failed: " . $e->getMessage());
    }
    ```

---

## ✅ Step 6: Queue the Mail

1. In `CourseCreated` class:

```php
use Illuminate\Contracts\Queue\ShouldQueue;

class CourseCreated extends Mailable implements ShouldQueue
```

2. Send using:

```php
Mail::to(Auth::user()->email)->queue(new CourseCreated());
```

---

## ✅ Step 7: Enable Database Queue

```bash
php artisan queue:table
php artisan migrate
php artisan queue:work
```
