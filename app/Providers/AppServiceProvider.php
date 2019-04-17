<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;
use Schema;

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
        // Fix "Specified key was too long error"
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        // Observers
        User::observe(UserObserver::class);
    }
}
