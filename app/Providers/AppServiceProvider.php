<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

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

         // Shares the $cartCount variable with EVERY single blade file automatically
        View::composer('*', function ($view) {
            if (Auth::check()) {
                // Sums up the 'quantity' column for the current logged-in user
                $count = CartItem::where('user_id', Auth::id())->sum('quantity');
            } else {
                $count = 0;
            }

            $view->with('cartCount', $count);
        });
    }
}
