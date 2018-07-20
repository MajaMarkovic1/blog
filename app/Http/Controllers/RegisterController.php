<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Middleware\CheckAge;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('age', ['only' => 'store']); //primenjivace se samo na store metodu
        
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
