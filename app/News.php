<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'content',
        'title',
        'image',
        'author'
    ];

     public function comments()
     {
         return $this->hasMany(Comment::class);
     }
}
