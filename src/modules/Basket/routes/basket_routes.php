<?php

use App\Modules\Basket\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){
        Route::get('/products', [ProductsController::class,'index'])->name('products.index');
});
