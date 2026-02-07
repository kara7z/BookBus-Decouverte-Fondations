<?php

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\BookingController;
use App\Models\Offer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cities = Offer::query()
        ->select('from_city as city')
        ->union(Offer::query()->select('to_city as city'))
        ->distinct()
        ->orderBy('city')
        ->pluck('city');

    return view('index', compact('cities'));
});

Route::get('/offers', [OfferController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
});

Route::delete('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
