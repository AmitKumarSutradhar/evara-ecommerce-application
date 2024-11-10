<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaraController;

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

Route::get('/', [EvaraController::class,'index'])->name('home');
Route::get('/product-category', [EvaraController::class, 'category'])->name('product-category');
Route::get('/product-detail', [EvaraController::class, 'product'])->name('product-detail');
