# Validations | Lazy Loading vs Eager Loading (day31 of backend course)

-   Pagination: get() -> paginate(int: number of items per page) -> `paginate(3)`
-   pagination applies, add this in url `?page=2`, you'll see the next items
-   render the links in View: `{{ $courses->links() }}`

-   `php artisan vendor:publish`
-   AppServiceProvider `Paginator::defaultView('vendor.pagination.bootstrap-4');`

-   HW: types of pagination and their works??

-   guarded = // protected $gaurded = ['id', 'created_at', 'updated_at'];
