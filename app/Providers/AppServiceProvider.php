<?php

namespace App\Providers;

use App\Observers\OrderObserver;
use App\Order;
use App\Services\IOrderService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        Order::observe(OrderObserver::class);
    }

    /**
     * @var array
     */
    public $bindings = [

        OrderService::class => IOrderService::class
    ];
}
