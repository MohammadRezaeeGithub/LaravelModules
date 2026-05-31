<?php

use App\Modules\Basket\Http\Controllers\BasketController;
use App\Modules\Basket\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){
        Route::get('/products', [ProductsController::class,'index'])->name('products.index');
        Route::get('/basket/add/{product}',[BasketController::class,'add'])->name('basket.add');
        Route::get('/basket',[BasketController::class,'index'])->name('basket.index');
});
