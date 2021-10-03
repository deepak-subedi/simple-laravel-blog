<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('register.create');
    }

    public function store() 
    {
        // validate the user data
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        // encrypt password "common way"
        // $attribute['password'] = bcrypt($attribute['password']);

        // encrypt password "other way or cleaner way: using setPasswordAttribute mutator in user model"

        // create a user and register his/her credential in database
        $user = User::create($attributes);

        // signin the user
        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        // redirect back to home page
        return redirect('/');
    }
}
