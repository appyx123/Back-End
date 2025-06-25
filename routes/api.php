<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\BookController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('list-user' ,[LatihanController::class, 'index']);
route::post('book', [BookController::class, 'store']);
route::get('book', [BookController::class, 'index']);
route::get('get-user', [BookController::class, 'getUser']);
route::put('book/{id}', [BookController::class, 'update']);
