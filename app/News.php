<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    protected $fillable = [
        'content',
        'intro',
        'title',
        'image',
        'user_id'
    ];

     public function comments()
     {
         return $this->hasMany(Comment::class);
     }

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function addComment($content)
     {
         // Metode 1
         $this->comments()->create(compact('content'));

         // Metode 2
         /*
         Comment::create([
             'content' => $content,
             'news_id' => $this->id
         ]);*/
     }

     public function scopeFilter($query, $filters)
     {

         if ($month = $filters['month']) {
             $query->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if ($year = $filters['year']) {
             $query->whereYear('created_at', $year);
         }

     }
}
