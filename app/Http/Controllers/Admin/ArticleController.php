<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\ArticleImage;
use Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all()->where('type' , '=' , 'article');

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'category_id' => 'required'
        ]);

        $article = Auth::user()->article()->create($attributes);

        //image upload
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:1999'
        ]);
        $images = $request->images;
        $i = 0;
        foreach ($images as $image)
        {
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $image->getClientOriginalExtension();
            $filenameToStore = $article->id . '_' . $i . '_' . date('Ymd_His') . '_' . $filenameWithExt;

            $is_main = false;
            if ($image == $images[0]) $is_main = true;

            if (Storage::putFileAs('public/articles', $image, $filenameToStore))
            {
                ArticleImage::create([
                    'title' => $filenameToStore,
                    'article_id' => $article->id,
                    'is_main' => $is_main
                ]);
            }

            $i++;
        }

        return redirect(route('admin.articles.show', $article->id));
    }

    public function show(Article $article)
    {
        $images = ArticleImage::all()->where('article_id', '=', $article->id);

        return view('admin.articles.show', compact('article', 'images'));
    }

    
    public function edit(Article $article)
    {
        $categories = Category::all()->where('type' , '=' , 'article')->except($article->category->id);

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    
    public function update(Request $request, Article $article)
    {
        $article->update($request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'category_id' => 'required'
        ]));

        return view('admin.articles.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('admin.articles.index'));
    }
}
