<?php

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('pages.home_page');
})->name('home');

Route::get('login', [AuthController::class, 'loginPage'])->name('login_page');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registration'])->name('registration');
Route::get('profile', [ProfileController::class, 'profilePage'])->name('profile_page');

/*
|=======================================================================================================================
| API ROUTES
|=======================================================================================================================
 */
Route::prefix('api')->group(function () {
    Route::get('user-popup', [UserApiController::class, 'getPopupData'])->name('get-popup-data');
});
