<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'title', 'description', 'type', 'author_id'
    ];

    public function author()
    {
    	return $this->belongsTo(User::class);
    }

    public function article()
    {
    	return $this->hasMany(Article::class);
    }
}
