<?php

use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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
    Route::get('product', [ProductController::class, 'productPage'])->name('product_page');
    Route::get('cart', [CartController::class, 'cartPage'])->name('user_cart');
    Route::get('category/{category}', [CategoryController::class, 'categoryPage'])->name('category_page');
    Route::get('material/{material}', [CategoryController::class, 'materialPage'])->name('material_page');

    // POST
    Route::post('profile/data', [ProfileController::class, 'saveUserData'])->name('profile_update_data');
    Route::post('profile/photo', [ProfileController::class, 'saveUserImage'])->name('profile_update_photo');
});

// Static page
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('contact', [PageController::class, 'contactsPage'])->name('contact_page');
Route::get('about', [PageController::class, 'aboutPage'])->name('about_page');
Route::get('rules-seller', [PageController::class, 'rulesSellerPage'])->name('rulesSeller_page');
Route::get('rules-settlements', [PageController::class, 'rulesSettlementsPage'])->name('rulesSettlements_page');
Route::get('how-make-order', [PageController::class, 'howMakeOrderPage'])->name('howMakeOrder_page');
Route::get('payment', [PageController::class, 'paymentPage'])->name('payment_page');
Route::get('delivery', [PageController::class, 'deliveryPage'])->name('delivery_page');


/*
|=======================================================================================================================
| API ROUTES
|=======================================================================================================================
 */
Route::prefix('api')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('user-popup', [UserApiController::class, 'getPopupData'])->name('get-popup-data');

        Route::post('shop/create', [ProfileApiController::class, 'createUserShop'])->name('create_shop');
        Route::post('shop/{shop}/update', [ProfileApiController::class, 'updateUserShop'])->name('update_shop');

        Route::get('product/get-select-values', [ProfileApiController::class, 'getSelectValues'])->name('product-select-data');
        Route::post('product/create', [ProfileApiController::class, 'createProduct'])->name('create_product');
        Route::post('product/{product}/update', [ProfileApiController::class, 'updateProduct'])->name('update_product');
        Route::get('product/{product}/delete', [ProfileApiController::class, 'deleteProduct'])->name('delete_product');
    });
});
