<?php

// app/Http/Controllers/Web/AuthController.php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginView() {
        return view('login');
    }

    public function signupView() {
        return view('signup');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('products.index');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function signup(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('products.index');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}

