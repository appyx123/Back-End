<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('book', [BookController::class, 'index']);
Route::get('kirim-email', [BookController::class, 'sendEmail']);
