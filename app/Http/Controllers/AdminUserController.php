<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(20)
        ]);
    }

    public function create()
    {  
        return view('admin.users.create');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
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
        // auth()->login($user);

        session()->flash('success', 'Your account has been created');

        // redirect back to home page
        return redirect('/');
    }

    public function update(User $user) 
    {
        // validate the user data
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)]
        ]);

        // check if new password is provided or not
        if (request()->filled('password')) {
            $attributes['password'] = request()->input('password');
        }

        // update the user
        $user->update($attributes);

        // return back
        return back()->with('success', 'User Updated!');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User Deleted!');
    }
}
