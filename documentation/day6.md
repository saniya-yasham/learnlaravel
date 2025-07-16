# Models and Showing Data on View (day19 of backend course)

-   Create view: Just add a heading "Add Course Page", don't create html form now
-   create()
-   I will show only how to add one data, rest you have to do.
-   create html form with one field only, and add @csrf token explain , show in inspector the token
-   try to add nullable() but running migration will delete the stored data

-   introduce Seeders
-   Make course seeder, then category seeder, for now manually add foriegn key
-   then add the nullable to all columns of courses

-   Now come back to html form.

-   create() method is shortcut

```php
public function store(Request $request)
{
    \App\Models\Course::create([
        'name' => $request->name,
    ]);

    return redirect('/');
}
```

-   Explain named routed. return redirect()->route('courses.index')
-   Explain Session: A session is like a temporary memory for each user. Types of session: Flash session, normal session.
-   Flash data Stored for 1 request only (->with()), even if we refresh the page, the old data gets deleted.
-   Normal data Stays until you remove it manually or it expires

-   pass a flash message:`return redirect()->with('success', 'Course saved using create()');`

```php
//show the flash message in view
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

```
