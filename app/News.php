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

     public function tags()
     {
         return $this->belongsToMany(Tag::class);
     }

     public function addComment($content)
     {
         // Metode 1
         //$this->comments()->create(compact('content'));

         $this->comments()->create([
             'content' => $content,
             'user_id' => auth()->id()
         ]);


         // Metode 2
         /*
         Comment::create([
             'content' => $content,
             'news_id' => $this->id
         ]);
         */
     }

    public function delete()
    {

        // delete all related comments also
        $this->comments()->delete();
        // delete the model
        return parent::delete();
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

     public static function archives()
     {

         return static::query()->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
             ->groupBy('year', 'month')
             ->orderByRaw('min(created_at) desc')
             ->get()
             ->toArray();
     }

     public function getImagePath()
     {
         return url('uploads/news/' . $this->image);
     }
}
