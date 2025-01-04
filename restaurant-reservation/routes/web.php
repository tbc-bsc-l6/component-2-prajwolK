<?php

use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // General user routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User-facing reservation routes (for regular users)
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

// Admin routes with role-based access
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class, [
        'names' => [
            'index' => 'admin.reservations.index',
            'create' => 'admin.reservations.create',
            'store' => 'admin.reservations.store',
            'show' => 'admin.reservations.show',
            'edit' => 'admin.reservations.edit',
            'update' => 'admin.reservations.update',
            'destroy' => 'admin.reservations.destroy',
        ]
    ]);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
