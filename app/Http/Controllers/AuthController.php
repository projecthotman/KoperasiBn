<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.pages.login");
    }
    public function login_action(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login berhasil! Selamat datang.');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Email atau password salah']);
    }
    public function register(){
        return view("auth.pages.register");
    }
    public function register_store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
    public function profile(){
        return view("auth.pages.profil");
    }
}
