<?php

namespace App\Providers;

use App\Models\category;
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
        view()->composer('*', function ($view) {
            $view->with ('categoriesGlobal', category::get()); //sobgulo category sob gulo page dekhanor jonno
        });
    
    }
}
