<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/appointments');

Route::controller(AppointmentController::class)->prefix('appointments')->group(function () {
    Route::get('/','index')->name('appointment.get');
    Route::post('store','store')->name('appointment.store');
});
