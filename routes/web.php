<?php

use App\Http\Controllers\PromoterController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::view('/', 'dashboard')->name('dashboard');

// Promoter
Route::controller(PromoterController::class)->group(function () {
    Route::get('/promoters/create', 'create')->name('promoters.create');
    Route::post('/promoters', 'store')->name('promoters.store');
    Route::post('/promoters/select', [PromoterController::class, 'select'])->name('promoters.select');
});
