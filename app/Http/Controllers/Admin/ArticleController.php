<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;

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

        return redirect(route('admin.articles.show', $article->id));
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
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
