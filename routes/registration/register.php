<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Registration Routes
Route::get('auth/register', [RegisterController::class, 'showRegisterForm'])->name('auth/register');
Route::post('auth/register', [RegisterController::class, 'register']);
// Login Routes
Route::get('auth/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('auth/login');
Route::post('auth/login', [LoginController::class, 'login'])->middleware('guest');

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
// Home Route
