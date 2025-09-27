<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrencelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [KrencelController::class, 'welcome'])->name('welcome');
Route::get('/product/{catid?}' ,[KrencelController::class, 'getProducts'])->name('all.product');
Route::get('/review', [ReviewController::class, 'getReview'])->name('get.review');
Route::post('/storeReview', [ReviewController::class, 'storeReview'])->name('review.store');


Route::get('/addProduct', [ProductController::class, 'getAddProduct'])->name('add.product');
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('product.store');
Route::get('/delete/{productid?}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::get('/editProduct/{productid?}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/updateProduct/{productid?}', [ProductController::class, 'updateProduct'])->name('product.update');

