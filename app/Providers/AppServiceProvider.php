<?php

namespace App\Providers;

use App\Models\Fertilizer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

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
      Paginator::defaultView('vendor.pagination.bootstrap-4');

      View::composer('main.index', function ($view) {
        $fertilizers = Cache::rememberForever('fertilizers', function () {
          return Fertilizer::all();
        });
        $view->with('fertilizers', $fertilizers);
      });

      
    }
}
