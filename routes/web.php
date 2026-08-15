<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/articles', function () {

    $articles = Articles::all();

    return view('articles.index', compact('articles'));
});


Route::get('/articles/{id}', function ($id){

    $article = Articles::find($id);

    return view('articles.show', ['article' => $article]);
});
