<?php
use App\Http\Controllers\Admin\AdminController as Admin;
use Illuminate\Support\Facades\Route;


Route::get('/login', [Admin::class, 'login'])->name('admin.login');
Route::post('/login', [Admin::class, 'authenticate']);


Route::group(['middleware' =>['auth:admin']], function () {
    Route::get('/', [Admin::class, 'index'])->name('admin.dashboard');
    Route::get('/products', [Admin::class, 'show'])->name('admin.products');

    Route::get('/addproducts', [Admin::class, 'addproducts'])->name('admin.addproducts');
    Route::post('/addproducts', [Admin::class, 'create']);

    Route::match(['get', 'post'],'/updateproducts', [Admin::class, 'updateProducts'])->name('admin.updateproducts');
    Route::post('/update', [Admin::class, 'update'])->name('admin.update');

    Route::post('/deleteproducts', [Admin::class, 'delete'])->name('admin.deleteproducts');
    Route::get('/logout', [Admin::class, 'logout'])->name('admin.logout');
});

