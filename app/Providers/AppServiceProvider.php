<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
        Blade::if('activelink', function (string $url) {
            return \Illuminate\Support\Facades\Request::getFacadeRoot()->getPathInfo() == $url;
        });
        Paginator::useBootstrap();
        // Paginator::useTailwind();        
    }
}
