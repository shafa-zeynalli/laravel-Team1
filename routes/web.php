<?php

use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\front\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('front.blog');
Route::get('/singlepage/{id}', [BlogController::class, 'sendSinglePage'])->name('front.singlepage');

Route::get('/cart', [CartController::class, 'index'])->name('front.cart');

Route::get('/login', [AuthController::class, 'sendLoginPage'])->name('front.login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/signup', [AuthController::class, 'sendSignupPage'])->name('front.signup');
Route::post('/signup', [AuthController::class, 'register']);
