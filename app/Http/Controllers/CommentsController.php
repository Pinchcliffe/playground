<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Comment;

class CommentsController extends Controller
{
    public function store(News $news)
    {
        $this->validate(request(), ['content' => 'required|min:2']);
        $news->addComment(request('content'));

        return back();
    }

    public function delete($comment) {


        Comment::query()->find($comment)->delete();

        return back();
    }
}