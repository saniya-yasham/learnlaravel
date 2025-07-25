<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Model::preventLazyLoading();
        // if APP_ENV=production = preventLazyLoading = false

        Gate::define('edit-delete-course', function(User $user, Course $course){
            return $course->user_id === $user->id;
        });

        Paginator::defaultView('vendor.pagination.bootstrap-5');
    }
}
