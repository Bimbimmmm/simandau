<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Gate::define('isAdmin', function($user) {
        return $user->is_admin == 1;
      });

      Gate::define('isOperator', function($user) {
        return $user->is_operator == 1;
      });

      Gate::define('isGuest', function($user) {
        return $user->is_guest == 1;
      });
    }
}
