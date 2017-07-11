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
        $users = $users->orderBy('name', 'DESC')->paginate(25);


        return View('users.index',
            [
                'users' => $users
            ]);
    }
    public function show($users) {

        return view('users.show', ['users' => User::where('id', $users)->first()]);
    }

    public function edit($id) {

        $users = User::query()->find($id);

        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        User::query()->find($id)->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        flash('Brukeren ble oppdatert!')->success()->important();

        return redirect('/users/' . $id);

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
            'password' => bcrypt(request('password'))
        ]);

        // Metode 2

        /*
        $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        */

        flash('Brukeren ble opprettet!')->success()->important();

        return redirect('/users');
    }

    public function delete($id) {

        User::query()->find($id)->delete();

        flash('Brukeren ble slettet!')->success()->important();

        return redirect('/users');
    }


}

