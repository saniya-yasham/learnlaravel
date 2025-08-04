# Laravel Search Bar – Step-by-Step

---

## ✅ Step 1: Add Route

```php
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
```

---

## ✅ Step 2: Create Search Form in Blade

```blade
<!-- resources/views/courses/index.blade.php -->
<form method="GET" action="{{ route('courses.index') }}">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search courses..."
    >
    <button type="submit">Search</button>
</form>
```

---

## ✅ Step 3: Update Controller to Filter Results

```php
public function index(Request $request)
{
    $query = Course::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $courses = $query->paginate(10)->withQueryString();

    return view('courses.index', compact('courses'));
}
```

## ✅ Bonus Tip

Use `withQueryString()` in pagination so the search term stays when changing pages:

```php
$courses = $query->paginate(10)->withQueryString();
```

---


