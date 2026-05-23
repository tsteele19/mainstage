<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Dashboard
Route::view('/', 'dashboard')->name('dashboard');
