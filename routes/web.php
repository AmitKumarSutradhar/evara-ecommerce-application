<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserController;
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
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;

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

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

// Customer
Route::get('/login-register', [CustomerAuthController::class, 'login'])->name('login-register');
Route::post('/login-check', [CustomerAuthController::class, 'loginCheck'])->name('login-check');
Route::get('/new-customer', [CustomerAuthController::class, 'newCustomer'])->name('new-customer');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');

Route::get('/my-dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard')->middleware(['customer']);




Route::middleware([ 'auth:sanctum',  config('jetstream.auth_session'),  'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
    Route::get('order/invoice/show/{orderId}', [OrderController::class,'invoice'])->name('order.invoice.show');
    Route::get('order/invoice/download/{orderId}', [OrderController::class,'invoiceDownload'])->name('order.invoice.download');
    Route::resource('order', OrderController::class);
    Route::resource('user', UserController::class)->middleware(['superAdmin']);
    Route::resource('advertisement', AdvertisementController::class);
    Route::resource('setting', SettingController::class);

    Route::get('get-sub-category-by-category', [ProductController::class, 'getSubcategoryByCategory'])->name('get-sub-category-by-category');

});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
