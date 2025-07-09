# Controller (day17 of backend course)

-   visit laravel doc, controller page

-   defination: Controllers can group related request handling logic into a single class. For example, a UserController class might handle all incoming requests related to users, including showing, creating, updating, and deleting users

-   WHat is request here: GET '/contact'

-   Create a controller using Artisan command:
    php artisan make:controller SampleController

-   Use PascalCase and end with "Controller" (singular, not plural)

-   Now let's use this controller function in route
-   Open routes/web.php
-   Use the controller and method like this:
    Route::get('/hello', [\App\Http\Controllers\SampleController::class, 'hello']);

-   This is how we move logic from route to controller
-   Keep controllers small and focused

# Migarations (day17 of backend course)

-   Go to phpMyAdmin and show how to create a table manually
-   Explain how to set column name, type, length, index, auto increment, primary key, etc.
-   Create a migration file with one column only (name as string), then run the migration
-   Show the migrations table in the database and explain the batch column
-   Update the migration file and add new columns, then try to run migration again
-   Show the error and explain why it occurs (Laravel prevents running the same migration twice without changes)

-   Explain three ways to update a migration file:

-   First method: create a new migration file (e.g. add_columns_to_courses_table) to add new columns
-   Second method: rename the original migration file, delete the existing table from phpMyAdmin, then run migration again
-   Third method: rollback the migration using artisan command with --step flag and then re-run migration
-   Start with showing the third method first, then second method, ask students to practice it

-   Finally, show them the proper and recommended first method

-   Tell them we know string, timestamps, id — for all other column types/methods just ask ChatGPT
