<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ArticleImage;
use App\Article;

class ArticleMainImageController extends Controller
{
    public function update(Request $request, Article $article, ArticleImage $image)
    {
    	ArticleImage::where('is_main', '=', 1)->update(['is_main' => 0]);

    	$image->update(['is_main' => 1]);
    	
    	return redirect(route('admin.articles.show', $article->id));
    }
}
