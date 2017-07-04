<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()->orderBy('created_at', 'desc')->get();

        return view ('news.index', compact('news'));
    }

    public function show($id) {
        $news = News::query()->find($id);

        return view('news.show', compact('news'));
    }
}
