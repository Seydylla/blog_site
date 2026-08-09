<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/articles', function () {
    $articles = []; // Fetch from DB: Article::all();

    return view('articles', compact('articles'));
});
