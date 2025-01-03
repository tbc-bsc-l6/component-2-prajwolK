<?php

use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;

Route::prefix('v1')->group(function () {
    // Table routes
    Route::get('/tables', [TableController::class, 'index']);
    // Reservation routes
    Route::post('/reservations', [ReservationController::class, 'store']);
});
