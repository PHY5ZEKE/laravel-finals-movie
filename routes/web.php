<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Customer
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin and Employee

Route::middleware(['auth', 'admin', 'employee'])->group(function () {

    Route::get('/management/dashboard', [ManagementController::class, 'index'])->name('management.dashboard');
    Route::get('/management/movie', [App\Http\Controllers\MovieController::class, 'index'])->name('management.movie.index');
    Route::get('/management/movie/create', [App\Http\Controllers\MovieController::class, 'create'])->name('management.movie.create');
    Route::post('/management/movie', [App\Http\Controllers\MovieController::class, 'store'])->name('management.movie.store');
    Route::get('/management/movie/{movie}', [App\Http\Controllers\MovieController::class, 'show'])->name('management.movie.show');
    Route::get('/management/movie/{movie}/edit', [App\Http\Controllers\MovieController::class, 'edit'])->name('management.movie.edit');
    Route::patch('/management/movie/{movie}', [App\Http\Controllers\MovieController::class, 'update'])->name('management.movie.update');
    Route::delete('/management/movie/{movie}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('management.movie.destroy');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
