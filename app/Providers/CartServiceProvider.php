<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CartInterfaceRepository;
use App\Repositories\CartSessionRepository;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartInterfaceRepository::class, CartSessionRepository::class);
    }
}
