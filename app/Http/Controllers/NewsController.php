<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use Validation;
use App\News;
use App\User;
use App\Tag;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $news = News::query()->latest()
            ->filter(request(['month', 'year']))
            ->paginate(5);

        return view ('news.index', compact('news'));
    }

    public function show(News $news) {

        return view('news.show', compact('news'));
    }

    public function create() {

        return view('news.create');
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'title' => 'required',
            'intro' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required'
        ]);

        // Metode 1
        /*auth()->user()->publish(
            new News(request([
                'title', 'image', 'intro', 'content'
            ]))
        );*/

        $image = $request->file('image');

        $name = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/news');

        $storedAs = $image->move($destinationPath, $name);

        if ($storedAs) {
            News::create([
                'title' => request('title'),
                'intro' => request('intro'),
                'content' => request('content'),
                'user_id' => Auth::user()->id,
                'image' => $name
            ]);
        } else {
            // TODO Handle error in saving image
        }

        // Metode 2


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

        //flash('Nyheten ble opprettet!')->success()->important();

        return redirect('/');
    }

    public function edit(News $news) {

        if ($news->user_id == Auth::user()->id) {
            return view('news.edit', compact('news'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'title' => 'required',
            'intro' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required'
        ]);

        if (request('image') != '') {
            $image = $request->file('image');

            $name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/news');

            $storedAs = $image->move($destinationPath, $name);

            if ($storedAs) {
                News::query()->find($id)->update([
                    'image' => $name
                ]);
            } else {
                // TODO Handle error in saving image
            }

        }

        News::query()->find($id)->update([
            'title' => request('title'),
            'intro' => request('intro'),
            'content' => request('content'),
            ]);

        flash('Nyheten ble oppdatert!')->success()->important();

        return redirect('/news/' . $id);

    }

    public function delete($id) {

        News::query()->find($id)->delete();

        flash('Nyheten ble slettet!')->success()->important();

        return redirect('/news');
    }
}
