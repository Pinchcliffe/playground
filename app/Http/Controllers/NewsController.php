<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $news = News::query()->latest()
            ->filter(request(['month', 'year']))
            ->get();

        // Midlertidig
        $archives = News::query()->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view ('news.index', compact('news', 'archives'));
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
            'content' => 'required'
        ]);

        // Metode 1

        auth()->user()->publish(
            new News(request([
                'title', 'image', 'intro', 'content'
            ]))
        );

        // Metode 2

        /*
        News::create([
            'title' => request('title'),
            'image' => request('image'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_id' => auth()->id()
        ]);
        */

        // Metode 3

        /*
        $news = new News;

        // Hente data fra form
        $news->title = request('title');
        $news->image = request('image');
        $news->intro = request('intro');
        $news->content = request('content');

        // Lagre data i database
        $news->save();
        */

        return redirect('/');
    }
}
