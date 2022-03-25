<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::name('admin.')->group(function () {
    Route::get('/', function () {return view('admin.index');})->name('home');
    Route::get('/users', [UserController::class, 'list'])->name('users');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user');
    Route::get('/categories', [CategoryController::class, 'list'])->name('categories');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category');
    Route::get('/materials', [MaterialController::class, 'list'])->name('materials');
    Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('material');
});
