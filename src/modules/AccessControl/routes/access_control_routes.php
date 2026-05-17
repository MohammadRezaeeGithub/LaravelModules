<?php


use App\Http\Controllers\UserController;
use App\Modules\AccessControl\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){
        Route::get('/', [UserController::class,'index'])->name('users.index');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::post('/users/{user}/edit',[UserController::class,'update'])->name('users.update');

});

Route::group(['middleware' => 'web'],function($router){
        Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
        Route::post('/roles',[RoleController::class,'store'])->name('roles.store');
        Route::get('roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
        Route::post('roles/{role}/edit',[RoleController::class,'update'])->name('roles.update');
});
