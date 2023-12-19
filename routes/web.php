<?php

use App\Http\Controllers\Front\AuthController  as Auth;
use App\Http\Controllers\Front\BlogController as Blog;
use App\Http\Controllers\Front\CartController as Cart;
use App\Http\Controllers\Front\OrderController as Order;
use Illuminate\Support\Facades\Route;

Route::get('/blog', [Blog::class, 'index'])->name('front.blog');
Route::get('/blog/{id}', [Blog::class, 'sendSinglePage'])->name('front.singlepage');
Route::get('/login', [Auth::class, 'sendLoginPage'])->name('front.login');
Route::post('/login', [Auth::class, 'authenticate']);
Route::get('/signup', [Auth::class, 'sendSignupPage'])->name('front.signup');
Route::post('/signup', [Auth::class, 'register']);

Route::group(['middleware'=>'auth'],function (){
    Route::match(['get', 'post'], '/cart', [Cart::class, 'index'])->name('front.cart');
    Route::post('/remove-products', [Cart::class, 'removeProduct'])->name('remove.product');
    Route::match(['get', 'post'], '/checkout', [Order::class, 'index'])->name('front.checkout');
    Route::match(['get', 'post'], '/thankyou', [Order::class, 'store'])->name('front.thankyou');
    Route::get('/account/details',[Auth::class,'accountDetails'])->name('front.accountDetails');
    Route::post('/account/details',[Auth::class,'updatePassword'])->name('front.updatePassword');
    Route::get('/account/orders',[Auth::class,'accountOrders'])->name('front.accountOrders');
    Route::get('/account/dashboard',[Auth::class,'accountDashboard'])->name('front.accountDashboard');
    Route::get('/account/logout',[Auth::class,'accountLogOut'])->name('front.accountLogOut');
    Route::get('/logout',[Auth::class,'logOut'])->name('front.logOut');
});

