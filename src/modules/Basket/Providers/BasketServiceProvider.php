<?php

namespace App\Modules\Basket\Providers;

use App\Modules\Basket\Services\Storage\Contracts\StorageInterface;
use App\Modules\Basket\Services\Storage\SessionStorage;
use Illuminate\Support\ServiceProvider;

class BasketServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadMigrationsFrom(__DIR__ .'/../Database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/basket_routes.php');
        $this->loadViewsFrom(__DIR__ .'/../resources/views', 'BasketViews');


        //it mean whenever we call StorageInterface to use as storge for basket, it returns an instance of SessionStorage
        $this->app->bind(StorageInterface::class,function($app){
            return new SessionStorage('cart');
        });
    }
}
