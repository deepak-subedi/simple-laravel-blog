<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }


    public function store() 
    {
        // validate the credential
        $attributes = request()->validate([
            'email' => 'required:email',
            'password' => 'required'
        ]);

        // authenticate and login the user
        if (! auth()->attempt($attributes)) {
            // if not authentiate throw exception
            throw ValidationException::withmessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        // session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'Logged In Successfully');
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged Out!!');
    }
}
