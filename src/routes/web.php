<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('users.index');
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
Route::post('/users/{user}/edit',[UserController::class,'update'])->name('users.update');

Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
