<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts');
    }

    public function store()
    {
        $credentials = request()->only(['email', 'password']);

        if(!auth()->attempt($credentials)){
            return redirect()->back()->withErrors([
                'message' => 'Bad credentials. Please try again!'
            ]);

        }      //attempt uloguje

        return redirect('/posts');
        
        
               
    }
    
}
