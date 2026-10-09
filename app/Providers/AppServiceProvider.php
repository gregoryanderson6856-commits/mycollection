<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        // Define a simple rule: only users with an 'admin' role can access admin areas
        Gate::define('access-admin', function (User $user) {
            return $user->role === 'admin'
                    ? Response::allow()
                    : Response::deny('You must be an administrator.');
        });
    }
}
