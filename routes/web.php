<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dungeonController;
use App\Http\Controllers\achievementsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/shop', function () {
    return view('shop.index');
})->middleware(['auth'])->name('shop');

Route::get('/achievements', [achievementsController::class, 'index'])->middleware(['auth'])->name('achievements');
Route::post('/achievements/{achivement}', [achievementsController::class, 'reward'])->middleware(['auth'])->name('achievement.reward');

Route::get('/dungeon', [dungeonController::class, 'index'])->middleware(['auth'])->name('dungeon');
Route::post('/dungeon/battle', [dungeonController::class, 'battle'])->middleware(['auth'])->name('dungeon.battle');

require __DIR__.'/auth.php';
