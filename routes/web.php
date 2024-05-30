<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthController;

Route::get('/', [BukuController::class, 'index'])->name('home');
Route::resource('bukus', BukuController::class);
Route::get('/search', [BukuController::class, 'search'])->name('search');
Route::get('/dashboard', [BukuController::class, 'dashboard'])->name('dashboard');
Route::get('/tentangkami', [BukuController::class, 'tentangkami'])->name('tentangkami');




// Rute untuk login dan logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');