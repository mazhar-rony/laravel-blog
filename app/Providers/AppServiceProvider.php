<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        // View Composer for share Categories to all view files, 
        //here * means all View Files, can define individual view file like "home.index"

        //view()->composer('home.index', function($view)
        //view()->composer(['home.index', 'search.category'], function($view)
        view()->composer('*', function($view) 
        {
            $categories = \App\Category::all();
            $view->with('categories', $categories);
        });
    }
}
