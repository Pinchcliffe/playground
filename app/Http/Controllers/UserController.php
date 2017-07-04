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


}