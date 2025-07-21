# Editing a Form

-   guarded = // protected $gaurded = ['id', 'created_at', 'updated_at'];

-   Edit Form:

```php
// Index - show all users
Route::get('/users', function () {
    $users = User::all();
    return view('users.index', compact('users'));
});

// Create - show form
Route::get('/users/create', function () {
    return view('users.create');
});

// Store - save new user
Route::post('/users', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
    ]);

    User::create([
        'name => $validated['name']    
        ]);
        
    return redirect('/users');
});

// Show - single user
Route::get('/users/{user}', function (User $user) {
    return view('users.show', compact('user'));
});

// Edit - show edit form
Route::get('/users/{user}/edit', function (User $user) {
    return view('users.edit', compact('user'));
});

// Update - save updated user
Route::put('/users/{user}', function (User $user) {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
    ]);

    $user->update($validated);
    return redirect('/users');
});

// Delete - remove user
Route::delete('/users/{user}', function (User $user) {
    $user->delete();
    return redirect('/users');
});
```
