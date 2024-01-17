<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Traits\Common;

class AppServiceProvider extends ServiceProvider
{
    use Common;
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
        View::share($this->showNotReadMessages());
        Paginator::useBootstrapFive();
    }
}
