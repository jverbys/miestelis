<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $fillable = [
    	'title', 'article_id', 'is_main'
    ];

    public function article()
    {
    	$this->belongsTo(Article::class);
    }
}
