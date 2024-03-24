<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('view.login');
    }

    public function login()
    {
        return view('login');
    }

    public function userLogin(Request $request)
    {
        $crendentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($crendentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'notmatch' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('view.login');
    }
}
