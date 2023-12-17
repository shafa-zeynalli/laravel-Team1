<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('front.blog');
Route::get('/singlepage/{id}', [BlogController::class, 'sendSinglePage'])->name('front.singlepage');

Route::get('/cart', [CartController::class, 'index'])->name('front.cart');
Route::post('/cart', [CartController::class, 'index']);
Route::post('/remove-products', [CartController::class, 'removeProduct'])->name('remove.product');

Route::match(['get', 'post'], '/checkout', [OrderController::class, 'index'])->name('front.checkout');
Route::match(['get', 'post'], '/thankyou', [OrderController::class, 'store'])->name('front.thankyou');

Route::get('/login', [AuthController::class, 'sendLoginPage'])->name('front.login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/signup', [AuthController::class, 'sendSignupPage'])->name('front.signup');
Route::post('/signup', [AuthController::class, 'register']);
Route::get('/account',[AuthController::class,'accountDetails'])->name('front.accountDetails');


