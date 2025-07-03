# Route and View (day 15 of backend course)

In Laravel, the `Route` class handles web routes. The `get` method is a static function used to define routes for GET requests. It takes two parameters: the URI (e.g., `/about`, `/contact`) and a callback function that returns a response. The callback can be an anonymous or named function, and it can return a string, a view, or other data.

Example:

```php
Route::get('/about', function () {
    return "<h1>This is about page</h1>";
});

Route::get('/contact', function () {
    return view("about");
});
```

---

-   Create three new Blade pages: home.blade.php, about.blade.php, and contact.blade.php inside views, add html5 biolerplate and add @vite line in head
-   can delete welcome page now
-   Blade is Laravel’s template engine with PHP/HTML support plus directives, components, and shortcuts
-   Add any basic HTML tag (e.g., <h1>) and simple navbar to test navigations. <a href="/about">About</a>
-   Define route for one page in routes/web.php `Route::get('/', function () { return view('home'); });`
-   Create a components > layout.blade.php
-   Blade provides a special variable called $slot which is used to inject content.
-   <?php echo $slot; ?> is equivalent to {{ $slot }} in Blade.

-   Notice the navbar is repeated on all pages, which is not DRY
-   Move the navbar code to a new file navbar.blade.php inside components
-   Replace the navbar in each page with the Blade component <x-navbar />
-   Create a reusable link component: link.blade.php with <a {{ $attributes }}>{{ $slot }}</a>. use- <x-link href="/">Home</x-link>
-   Each component has access to a special $attributes variable for dynamic props