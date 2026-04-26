<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

/*
| Public redirect
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
| AUTH PROTECTED AREA
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Modules
    Route::resource('services', ServiceController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('payments', PaymentController::class);

});

require __DIR__.'/auth.php';