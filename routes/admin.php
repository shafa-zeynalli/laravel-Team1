<?php


use App\Http\Controllers\Admin\AdminController as Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [Admin::class, 'index'])->name('admin.dashboard');
