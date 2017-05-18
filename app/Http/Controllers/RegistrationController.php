<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        //validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        //create and save the User
        //$user = User::create(request(['name', 'email', 'password']));
        $user = New User;
        $user -> name = request('name');
        $user -> email = request('email');
        $user -> password = bcrypt(request('password'));
        $user -> save();

        //sign them in
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        //Redirect to the home page
        return redirect()->home();
    }


}
