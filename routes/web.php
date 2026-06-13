<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PromoterController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::view('/', 'dashboard')->name('dashboard');

// Promoter
Route::resource('promoters', PromoterController::class)
    ->only(['create','store','show',]);
Route::post('/promoters/select', [PromoterController::class, 'select'])
    ->name('promoters.select');

// Venues
Route::resource('venues', VenueController::class)->only(['index', 'create', 'store', 'show']);

// Artists
Route::resource('artists', ArtistController::class)->only(['index', 'create', 'store', 'show']);
