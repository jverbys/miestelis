<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ArticleCategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all()->where('type', '=', 'article');
    	return view('admin.articles.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.articles.categories.create');
    }

    public function store(Request $request)
    {
    	$attributes = $request->validate([
    		'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
    	]);

    	$attributes += ['type' => 'article'];

    	Auth::user()->category()->create($attributes);

    	return redirect(route('admin.articles.categories.index'));
    }

    public function edit(Category $category)
    {
    	return view('admin.articles.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
    	$category->update($request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
        ]));

        return redirect(route('admin.articles.categories.index'));
    }

    public function destroy(Category $category)
    {
    	$category->delete();

        return redirect(route('admin.articles.categories.index'));
    }
}
