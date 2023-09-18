<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Blog\CategoriesController as BlogCategoriesController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubscribesController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsImagesController;
use App\Http\Controllers\Admin\ProductReviewsController;
use App\Models\ProductImages;
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

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.postLogin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware('auth:admin');
Route::prefix('/user')->middleware('auth:admin')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/show/{id}', [UserController::class, 'show']);
});
Route::prefix('/categories')->middleware('auth:admin')->group(function () {
    Route::get('/', [CategoriesController::class, 'index']);
    Route::get('/create', [CategoriesController::class, 'create']);
    Route::post('/', [CategoriesController::class, 'store']);
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->where('id', '[0-9]+');
    Route::put('/', [CategoriesController::class, 'update']);
    Route::get('/{id}', [CategoriesController::class, 'show'])->where('id', '[0-9]+');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->where('id', '[0-9]+');
});
Route::prefix('admins')->middleware('auth:admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/{id}', [AdminController::class, 'show'])->where('id', '[0-9]+');
});

Route::prefix('/products')->middleware('auth:admin')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/search', [ProductsController::class, 'index'])->name('products.search');

    Route::get('/create', [ProductsController::class, 'create']);
    Route::post('/', [ProductsController::class, 'store']);
    Route::get('/{id}/edit', [ProductsController::class, 'edit'])->where('id', '[0-9]+');
    Route::put('/', [ProductsController::class, 'update']);
    Route::get('/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+');
    Route::delete('/', [ProductsController::class, 'destroy']);

    Route::get('/{id}/reviews', [ProductReviewsController::class, 'index'])->where('id', '[0-9]+');
    Route::put('/{id}/reviews', [ProductReviewsController::class, 'update'])->where('id', '[0-9]+');

    Route::get('/{id}/image', [ProductsImagesController::class, 'index'])->where('id', '[0-9]+')->name('products.image.index');
    Route::post('/{id}/image', [ProductsImagesController::class, 'store']);
});

Route::get('/subscribes', [SubscribesController::class, 'index'])->middleware('auth:admin');

Route::prefix('supplier')->middleware('auth:admin')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/store', [SupplierController::class, 'store']);
    Route::get('edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/update', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::prefix('blog/categories')->middleware('auth:admin')->group(function () {
    Route::get('/', [BlogCategoriesController::class, 'index']);
    Route::get('/show/{id}', [BlogCategoriesController::class, 'show']);
    Route::get('/create', [BlogCategoriesController::class, 'create']);
    Route::post('/create', [BlogCategoriesController::class, 'store'])->name('blog.categories.store');
    Route::get('/edit/{id}', [BlogCategoriesController::class, 'edit']);
    Route::put('/update', [BlogCategoriesController::class, 'update'])->name('blog.categories.update');
    Route::delete('/delete/{id}', [BlogCategoriesController::class, 'destroy'])->name('blog.categories.destoy');
});

Route::prefix('blog/post')->middleware('auth:admin')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/show/{id}', [PostController::class, 'show']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/create', [PostController::class, 'store'])->name('blog.post.store');
    Route::get('/edit/{id}', [PostController::class, 'edit']);
    Route::put('/update', [PostController::class, 'update'])->name('blog.post.update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('blog.post.destoy');
});


Route::prefix('orders')->middleware('auth:admin')->group(function () {
    Route::get('/', [OrdersController::class, 'index']);
    Route::get('/{id}', [OrdersController::class, 'show']);
});
