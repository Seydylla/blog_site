<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::resource('articles', ArticleController::class);
