<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $news = News::query()->orderBy('id', 'desc')->get();

        return view ('news.index', compact('news'));
    }

    public function show(News $news) {

        return view('news.show', compact('news'));
    }

    public function create() {

        return view('news.create');
    }

    public function store() {

        $news = new News;

        // Hente data fra form
        $news->title = request('title');
        $news->image = request('image');
        $news->intro = request('intro');
        $news->author = request('author');
        $news->content = request('content');

        // Lagre data i database
        $news->save();

        return redirect('/news');
    }
}
