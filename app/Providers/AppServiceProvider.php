<?php

namespace App\Providers;

use App\Models\User\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Schema::defaultStringLength(225);

        Gate::define('administrator', function(User $user){
            return $user->role === 'Administrator';
        });

        Gate::define('petugas', function(User $user){
            return $user->role === 'Petugas';
        });
    }
}
