<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::resource('articles', ArticleController::class);

Route::get('/register', [RegisteredUserController::class, 'create']);
