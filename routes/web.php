<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/shop', function () {
    return view('shop.index');
})->middleware(['auth'])->name('shop');

require __DIR__.'/auth.php';
