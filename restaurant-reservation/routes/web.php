<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'myhome'])
;
Route::get('/home',[HomeController::class,'index']);
Route::get('/addfood',[AdminController::class,'addfood']);
Route::post('/uploadfood',[AdminController::class,'uploadfood']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
