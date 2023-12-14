<?php

use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('front.blog');
Route::get('/singlepage/{id}', [BlogController::class, 'sendSinglePage'])->name('front.singlepage');
Route::get('/login', [BlogController::class, 'sendLoginPage'])->name('front.singlepage');
Route::get('/signup', [BlogController::class, 'sendSignupPage'])->name('front.singlepage');
