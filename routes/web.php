<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});


use App\Http\Controllers\BookController;

Route::get('/books/create', [BookController::class, 'create']);

Route::get('/books', [BookController::class, 'index']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/books/{book}', [BookController::class, 'show']);