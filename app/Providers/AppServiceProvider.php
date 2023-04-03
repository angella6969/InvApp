<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        Gate::define('SuperAdmin', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('Admin', function (User $user) {
            return $user->role_id == 1 || $user->role_id == 2;
        });
        Gate::define('Client', function (User $user) {
            return $user->role_id == 3;
        });
    }
}
