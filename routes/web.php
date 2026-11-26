<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/produk/{product}', [PublicController::class, 'show'])->name('public.show');

// Halaman Admin CRUD
Route::resource('/admin/products', AdminProductController::class)->except(['show']);