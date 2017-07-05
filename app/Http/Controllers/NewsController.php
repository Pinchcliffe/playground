<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validation;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $news = News::query()->latest()->get();

        return view ('news.index', compact('news'));
    }

    public function show(News $news) {

        return view('news.show', compact('news'));
    }

    public function create() {

        return view('news.create');
    }

    public function store() {

        $this->validate(request(), [
            'title' => 'required',
            'intro' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);

        $news = new News;

        // Hente data fra form
        $news->title = request('title');
        $news->image = request('image');
        $news->intro = request('intro');
        $news->author = request('author');
        $news->content = request('content');

        // Lagre data i database
        $news->save();

        return redirect('/');
    }
}
