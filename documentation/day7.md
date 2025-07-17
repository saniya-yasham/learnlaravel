# Validations | Lazy Loading vs Eager Loading  (day20 of backend course)

-   validate([validations], [custom error messages])
    // validate()
    // 1. If validation passes ➜ continues to the next step (e.g. storing data)
    // 2. If validation fails  ➜ automatically redirects back to the form page
    //    - Sanitizes the data (trims spaces, normalizes etc.)
    //    - $errors  ➜ stores all validation error messages for each field
    //    - old()    ➜ retains the user's previous input so the form isn't empty again


-   View - @dump($errors->all(), old());
```php
// Both are same, better is validatedData
  Course::create([
            'name' => $request->name,
            'name' => $validatedData['name'],
        ]);
```

-   Explain eager loading: User::with('phone')->get() to avoid 1+N queries with birthday kid example
-   Emphasize why relationships simplify data fetching and keep code clean

-   Disabling lazy loading entirely ('know what you are doing'): 
        AppServiceProvider = configuration of our app

- Pagination: get() -> paginate(int: number of items per page) -> `paginate(3)`
-   pagination applies, add this in url `?page=2`, you'll see the next items
-   render the links in View: $courses->links();