<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\BookingController;


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

     //Movie Management
    Route::get('/management/movie', [MovieController::class, 'index'])->name('management.movie.index');
    Route::get('/management/movie/create', [MovieController::class, 'create'])->name('management.movie.create');
    Route::post('/management/movie', [MovieController::class, 'store'])->name('management.movie.store');
    Route::get('/management/movie/{movie}', [MovieController::class, 'show'])->name('management.movie.show');
    Route::get('/management/movie/{movie}/edit', [MovieController::class, 'edit'])->name('management.movie.edit');
    Route::patch('/management/movie/{movie}', [MovieController::class, 'update'])->name('management.movie.update');
    Route::delete('/management/movie/{movie}', [MovieController::class, 'destroy'])->name('management.movie.destroy');

    //User Management
    Route::get('/management/user', [UserController::class, 'index'])->name('management.user.index');
    Route::get('/management/user/{user}', [UserController::class, 'show'])->name('management.user.show');
    Route::get('/management/user/{user}/edit', [UserController::class, 'edit'])->name('management.user.edit');
    Route::delete('/management/user/{user}', [UserController::class, 'destroy'])->name('management.user.destroy');
    Route::put('/management/user/{user}', [UserController::class, 'update'])->name('management.user.update');

    //Theater Management
    Route::get('/management/theater', [TheaterController::class, 'index'])->name('management.theater.index');
    Route::get('/management/theater/create', [TheaterController::class, 'create'])->name('management.theater.create');
    Route::post('/management/theater', [TheaterController::class, 'store'])->name('management.theater.store');
    Route::get('/management/theater/{theater}', [TheaterController::class, 'show'])->name('management.theater.show');
    Route::get('/management/theater/{theater}/edit', [TheaterController::class, 'edit'])->name('management.theater.edit');
    Route::patch('/management/theater/{theater}', [TheaterController::class, 'update'])->name('management.theater.update');
    Route::delete('/management/theater/{theater}', [TheaterController::class, 'destroy'])->name('management.theater.destroy');

    //Showtime Management
    Route::get('/management/showtime', [ShowtimeController::class, 'index'])->name('management.showtime.index');
    Route::get('/management/showtime/create', [ShowtimeController::class, 'create'])->name('management.showtime.create');
    Route::post('/management/showtime', [ShowtimeController::class, 'store'])->name('management.showtime.store');
    Route::get('/management/showtime/{showtime}', [ShowtimeController::class, 'show'])->name('management.showtime.show');
    Route::delete('/management/showtime/{showtime}', [ShowtimeController::class, 'destroy'])->name('management.showtime.destroy');
    Route::get('/management/showtime/{showtime}/edit', [ShowtimeController::class, 'edit'])->name('management.showtime.edit');
    Route::patch('/management/showtime/{showtime}', [ShowtimeController::class, 'update'])->name('management.showtime.update');

    //Booking Management
    Route::get('/management/booking', [BookingController::class, 'index'])->name('management.booking.index');

});

//Movie Customer
Route::get('/customer/movie', [MovieController::class, 'index_customer'])->name('customer.movie.index');
Route::get('/customer/movie/{movie}', [MovieController::class, 'show_customer'])->name('customer.movie.show');
//Showtime Customer
Route::get('/customer/showtime', [ShowtimeController::class, 'index_customer'])->name('customer.showtime.index');
Route::get('/customer/showtime/{showtime}', [ShowtimeController::class, 'show_customer'])->name('customer.showtime.show');

//Booking Customer
Route::get('/customer/booking/{showtime}', [BookingController::class, 'create'])->name('customer.booking.create');
Route::post('/customer/booking', [BookingController::class, 'store'])->name('customer.booking.store');
Route::get('/customer/booking', [BookingController::class, 'index_customer'])->name('customer.booking.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
