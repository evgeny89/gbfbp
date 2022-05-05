<?php

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET
Route::get('login', [AuthController::class, 'loginPage'])->name('login_page');
Route::get('register', [AuthController::class, 'register'])->name('register');

// POST
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'registration'])->name('registration');

// Auth groups
Route::middleware('auth')->group(function () {
    // GET
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'profilePage'])->name('profile_page');
    Route::get('profile/set-card/{card}', [ProfileController::class, 'setFavoriteCard'])->name('set_favorite_card');
    Route::get('favorite', [ProfileController::class, 'favoritePage'])->name('favorite_page');
    Route::get('orders', [ProfileController::class, 'ordersPage'])->name('orders_page');
    Route::get('user_shop', [ProfileController::class, 'shopPage'])->name('shop_page');

    // POST
    Route::post('profile/data', [ProfileController::class, 'saveUserData'])->name('profile_update_data');
    Route::post('profile/photo', [ProfileController::class, 'saveUserImage'])->name('profile_update_photo');
    Route::post('shop/create', [ProfileController::class, 'createUserShop'])->name('create_shop');
});

// Static page
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('contact', [PageController::class, 'contacts'])->name('contact');

/*
|=======================================================================================================================
| API ROUTES
|=======================================================================================================================
 */
Route::prefix('api')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('user-popup', [UserApiController::class, 'getPopupData'])->name('get-popup-data');
    });
});
