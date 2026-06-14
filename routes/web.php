<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// ===== HALAMAN PUBLIK =====
Route::get('/', function () {
    return view('home');
})->name('home');

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ===== AREA ADMIN (harus login) =====
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kategori - CRUD
    Route::resource('category', CategoryController::class);

    // Menu - CRUD
    Route::resource('menu', MenuController::class);

    // Order - CRUD + update status
    Route::resource('order', OrderController::class);
    Route::patch('/order/{order}/status', [OrderController::class, 'updateStatus'])->name('order.status');
});
