<?php

use App\Http\Controllers\PromoterController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::view('/', 'dashboard')->name('dashboard');

// Promoter
Route::resource('promoters', PromoterController::class)
    ->only(['create','store','show',]);
Route::post('/promoters/select', [PromoterController::class, 'select'])
    ->name('promoters.select');
