<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EvaraController::class, 'index'])->name('home');
Route::get('/product-category', [EvaraController::class, 'category'])->name('product-category');
Route::get('/product-detail/{id}', [EvaraController::class, 'productDetail'])->name('product-detail');


Route::resources(['cart'=> CartController::class]);

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');


Route::middleware([ 'auth:sanctum',  config('jetstream.auth_session'),  'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
    Route::get('get-sub-category-by-category', [ProductController::class, 'getSubcategoryByCategory'])->name('get-sub-category-by-category');

});
