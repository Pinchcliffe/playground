<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $users = User::query();
        $users = $users->orderBy('name', 'DESC')->get();


        return View('users.index',
            [
                'users' => $users
            ]);
    }
    public function show($users) {

        return view('users.show', ['users' => User::where('id', $users)->first()]);
    }

    public function create() {
        return view('users.create');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Metode 1

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        // Metode 2

        /*
        $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        */

        return redirect('/users');
    }


}

