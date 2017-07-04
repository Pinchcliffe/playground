<?php
namespace App\Http\Controllers;

use App\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;


class UserController extends Controller {

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