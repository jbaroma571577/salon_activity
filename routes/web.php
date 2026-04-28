<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {

   
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    
    Route::resource('services', ServiceController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('payments', PaymentController::class);

});

require __DIR__.'/auth.php';
