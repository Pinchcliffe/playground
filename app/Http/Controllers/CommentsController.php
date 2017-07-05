<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Comment;

class CommentsController extends Controller
{
    public function store(News $news)
    {
        Comment::create([
            'content' => request('content'),
            'news_id' => $news->id
        ]);

        return back();
    }
}
