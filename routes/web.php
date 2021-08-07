<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('master');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect ('login');
});


Route::post('/login', [UserController::class,'login']);

Route::get('/product',
    [ProductController::class,'index']);

    Route::get('/search',
    [ProductController::class,'search']);

    Route::post('/addtocart',
    [ProductController::class,'add_to_cart']);

    Route::get('/yourcart',
    [ProductController::class,'cartlist']);
    