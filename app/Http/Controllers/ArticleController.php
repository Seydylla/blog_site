<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index() {
        $articles = Articles::latest()->paginate(3);

        return view('articles.index', compact('articles'));
    }

    public function create() {
        return view('articles.create');
    }

    public function show(Articles $article) {
        return view('articles.show', ['article' => $article]);
    }

    public function store(Request $request) {
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
    }

    public function edit(Articles $article) {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Articles $article) {
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
    }

    public function destroy(Articles $article) {
        $article->delete();
        return redirect('/articles');
    }
}
