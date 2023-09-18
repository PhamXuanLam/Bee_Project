<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubscribesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductSearchController;

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

Route::get('/', [HomeController::class, "index"]);
Route::get('/login', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/detail', [DetailController::class, "index"]);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');
Route::post('/subscribes', [SubscribesController::class, 'store']);
Route::get('/forgotPassword', [AuthController::class, 'forgotPassword']);
Route::post('/confirmEmail', [AuthController::class, 'confirmEmail']);
Route::post('/codeConfirm', [AuthController::class, 'codeConfirm']);
Route::post('/confirmAgain', [AuthController::class, 'confirmAgain']);

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index']);
});

Route::post('/products/reviews', [ProductsController::class, 'review'])
    ->where('id','[0-9]+')
    ->middleware(['auth:web']);
    
    Route::get('/p{id}-{slug}.html', [ProductsController::class, 'show'])->where('id', '[0-9]+');

    Route::post('/favourite', [ProductsController::class, 'favourite'])->middleware('auth:web');




Route::get('/c-{id}-{slug}.html', [ProductsController::class, 'index']);

Route::get('/search', [ProductSearchController::class, 'index'])->name('products-search');

Route::prefix('cart')->group(function(){
    Route::get('/',[CartController::class,'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::put('/', [CartController::class, 'update']);
    Route::delete('/', [CartController::class, 'destroy']);
});

Route::prefix('/checkout')->middleware(['auth:web'])->group(function () {
    Route::get('/', [CheckoutController::class, 'index']);
    Route::post('/', [CheckoutController::class, 'store']);
});

Route::prefix('/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
    Route::post('/', [ContactController::class, 'store']);
});

Route::prefix('/account')->middleware(['auth:web'])->group(function () {
    Route::get('/', [AccountController::class, 'index']);
    Route::put('/', [AccountController::class, 'store']);

    Route::get('/changePassword', [AccountController::class, 'changePassword']);
    Route::put('/changePassword', [AccountController::class, 'updatePassword']);

    Route::get('/orders', [AccountController::class, 'orders']);
    Route::get('/orders/{id}', [AccountController::class, 'orderItems'])->where('id', '[0-9]+');
});
