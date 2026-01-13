<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use View;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();
        View::composer('*', fn($view) => 
            $view->with('menus', Menu::whereNull('parent_id')->where('is_active', '1')->with('children')->orderBy('order')->get()
            )
        );
    }
}
