<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/articles', function () {

    $articles = Articles::latest()->paginate(3);

    return view('articles.index', compact('articles'));
});

Route::get('/articles/create', function () {

    return view('articles.create');
});


Route::get('/articles/{id}', function ($id){

    $article = Articles::find($id);

    return view('articles.show', ['article' => $article]);
});

Route::post('/articles/create', function (Request $request) {
    // 1. Validate inputs (Laravel automatically redirects back with $errors if validation fails)
    $validated = $request->validate([
        'title'               => 'required|min:1|max:20',
        'catagory'            => 'required|string',
        'header'              => 'required|min:1|max:100',
        'article_description' => 'required|min:1|max:1000',
        'img'                 => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'read_time'           => 'required|integer',
        'writer_id'           => 'required|integer',
    ]);

    // 2. Handle File Upload (moves file to public/images)
    $image = $request->file('img');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);

    // 3. Create Article in Database
    Articles::create([
        'title'               => $validated['title'],
        'catagory'            => $validated['catagory'],
        'header'              => $validated['header'],
        'article_description' => $validated['article_description'],
        'img'                 => $imageName,
        'read_time'           => $validated['read_time'],
        'writer_id'           => $validated['writer_id'],
        'date'                => now()->toDateString(),
    ]);

    return redirect('/articles');
});

Route::get('/articles/{id}/edit', function ($id){

    $article = Articles::find($id);

    return view('articles.edit', ['article' => $article]);
});

Route::patch('/articles/{article}', function (Request $request, Articles $article) {
    $validated = $request->validate([
        'title'               => 'required|min:1|max:20',
        'catagory'            => 'required|string',
        'header'              => 'required|min:1|max:100',
        'article_description' => 'required|min:1|max:1000',
        'img'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'read_time'           => 'required|integer',
        'writer_id'           => 'required|integer',
    ]);

    if ($request->hasFile('img')) {
        if ($article->img && File::exists(public_path('images/' . $article->img))) {
            File::delete(public_path('images/' . $article->img));
        }

        $image = $request->file('img');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $validated['img'] = $imageName;
    }

    $article->update($validated);

    return redirect('/articles/' . $article->id);
});

Route::delete('/articles/{id}', function ($id){

    Articles::findOrFail($id)->delete();

    return redirect('/articles');
});
