<?php

namespace App\Providers;

use App\Contracts\WebCheckoutContract;
use App\Services\PlaceToPayFaker;
use App\Services\PlaceToPayServices;
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
        if(config('app.faker_services')){
            $this->app->bind(WebCheckoutContract::class, PlaceToPayFaker::class);
        }
        else{
            $this->app->bind(WebCheckoutContract::class, PlaceToPayServices::class);
        }
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
