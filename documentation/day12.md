# ✅ Laravel Traits 
---

## 💡 What is a Trait?

- A reusable block of code (methods/properties)
- Allows us to **share logic** between multiple classes
- Similar to copy-paste, but cleaner and organized

---

## 🧪 Step 1: Create a Trait

```bash
php artisan make:trait LogsUserActivity
```

This creates:

```php
// app/Traits/LogsUserActivity.php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait LogsUserActivity
{
    public function logActivity($action)
    {
        Log::info("User activity: " . $action);
    }
}
```

---

## 🧪 Step 2: Use Trait in a Model or Controller

```php
use App\Traits\LogsUserActivity;

class CourseController extends Controller
{
    use LogsUserActivity;

    public function store(Request $request)
    {
        $this->logActivity('Created a new course');
        // ... rest of logic
    }
}
```

---

## 🧪 Step 3: Traits Can Have:

- Methods
- Properties
- Even boot methods for models

---

## ✅ Real Use Cases in Laravel

| Trait Name | Use |
|------------|-----|
| `LogsActivity` | Log actions across models |
| `HasUuid` | Automatically assign UUIDs to models |
| `HasRole` | Reusable role/permission logic |
| `UploadsFiles` | Common file upload logic |
| `GeneratesSlug` | Reuse slug generation code |

---

## 🧠 Notes

- You can use multiple traits in a class: `use A, B;`
- If two traits have the same method, you must resolve the conflict manually
- Traits help keep **controllers/models clean** and DRY

---

## 🔥 Bonus: Trait for Model Boot Method

```php
trait AssignsUserId
{
    protected static function bootAssignsUserId()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }
}
```

Then in your model:

```php
class Course extends Model
{
    use AssignsUserId;
}
```
