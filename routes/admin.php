<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'home'])->name('home');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');

    Route::get('/users', [UserController::class, 'list'])->name('users');
    Route::get('/users/new', [UserController::class, 'newEntry'])->name('new-user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user');
    Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('delete-user');

    Route::get('/categories', [CategoryController::class, 'list'])->name('categories');
    Route::get('/categories/new', [CategoryController::class, 'newEntry'])->name('new-category');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category');
    Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('delete-category');

    Route::get('/materials', [MaterialController::class, 'list'])->name('materials');
    Route::get('/materials/new', [MaterialController::class, 'newEntry'])->name('new-material');
    Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('material');
    Route::get('/materials/{id}/delete', [MaterialController::class, 'delete'])->name('delete-material');

    Route::post('/users/new', [UserController::class, 'create'])->name('save-new-user');
    Route::post('/users/{id}/edit', [UserController::class, 'update'])->name('save-user');

    Route::post('/categories/new', [CategoryController::class, 'create'])->name('save-new-category');
    Route::post('/categories/{id}/edit', [CategoryController::class, 'update'])->name('save-category');

    Route::post('/materials/new', [MaterialController::class, 'create'])->name('save-new-material');
    Route::post('/materials/{id}/edit', [MaterialController::class, 'update'])->name('save-material');
});
