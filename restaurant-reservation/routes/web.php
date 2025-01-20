<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

//HomeControllers
Route::get('/', [HomeController::class, 'myhome']);
Route::get('/home',[HomeController::class,'index']);
Route::post('/addtocart/{id}',[HomeController::class,'addtocart']);
Route::get('/mycart',[HomeController::class,'mycart']);
Route::post('/confirmorder',[HomeController::class,'confirmorder']);
Route::post('/booktable',[HomeController::class,'booktable']);
Route::get('/removecart/{id}',[HomeController::class,'removecart']);

//AdminControllers
Route::middleware(['auth'])->group(function(){
    Route::get('/addfood',[AdminController::class,'addfood']);
    Route::get('/viewfood',[AdminController::class,'viewfood']);
    Route::post('/uploadfood',[AdminController::class,'uploadfood']);
    Route::delete('/deletefood/{id}',[AdminController::class,'deletefood'])->name('deletefood');
    Route::get('/editfood/{id}',[AdminController::class,'editfood']);
    Route::put('/foodedit/{id}',[AdminController::class,'foodedit'])->name('foodedit');
    Route::get('/orders',[AdminController::class,'orders']);
    Route::get('/ontheway/{id}',[AdminController::class,'ontheway']);
    Route::get('/delivered/{id}',[AdminController::class,'delivered']);
    Route::get('/cancel/{id}',[AdminController::class,'cancel']);
    Route::get('/reservation',[AdminController::class,'reservation']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
