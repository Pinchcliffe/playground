<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag) {

        $news = $tag->news;

        return view('news.index', compact('news'));
    }

    // TODO: Mulighet for å legge til tags når man oppretter newsgit st
}
