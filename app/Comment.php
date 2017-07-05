<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'news_id'
    ];
    
    public function news()
     {
        return $this->belongsTo(News::class);
    }
}
