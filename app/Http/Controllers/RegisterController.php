<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store()
    {
        $this->validate(request(), [
        'name' => 'required', 
        'email' => 'required|email|unique:users', 
        'password' => 'required|min:6'
        ]);        

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);   //helper

        return redirect('/posts');
    }
}