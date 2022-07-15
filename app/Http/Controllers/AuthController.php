<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function signup(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) 
            //'password' => hash($request->getPassword) 
        ]);

        return redirect('/login');
    }

    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if(auth()->attempt($credentials)){//através das coisas ali em cima ele tenta fazer login
            //dd($credentials);
            return redirect('/dashboard');
        }
        return redirect('/login');
        //return redirect()->back(); volta uma página que nesse caso era o login
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
