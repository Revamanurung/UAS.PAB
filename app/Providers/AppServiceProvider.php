<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TransaksiStock;
use App\Observers\StockTransactionObserver;

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
        TransaksiStock::observe(StockTransactionObserver::class);
    }
}
