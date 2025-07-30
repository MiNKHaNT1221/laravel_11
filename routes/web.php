<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/upgrade', [\App\Http\Controllers\UpgradeController::class, 'showForm'])->name('upgrade.form');
Route::post('/upgrade', [\App\Http\Controllers\UpgradeController::class, 'submitForm'])->name('upgrade.submit');

require __DIR__.'/auth.php';
