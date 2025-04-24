<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComputersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('./index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes for viewing, editing, updating, and deleting
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Computers resource route
Route::resource('computerss', 'App\Http\Controllers\ComputersController')->middleware('auth');

require __DIR__.'/auth.php';

// Computers specific routes
Route::get('/computerss/create', [ComputersController::class, 'create'])->name('computerss.create');
Route::post('/computerss', [ComputersController::class, 'store'])->name('computerss.store');
Route::get('/computerss/{id}/edit', [ComputersController::class, 'edit'])->name('computerss.edit');
Route::put('/computerss/{id}', [ComputersController::class, 'update'])->name('computerss.update');
Route::delete('/computerss/{id}', [ComputersController::class, 'destroy'])->name('computerss.destroy');


