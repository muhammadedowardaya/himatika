<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('berhasilLogin', 'pesan.berhasil("Login success!")');
            return redirect()->intended('/dashboard');
        }
        session()->flash('gagalLogin', 'pesan.gagal("Login failed!")');
        return redirect('/login');
    }
}