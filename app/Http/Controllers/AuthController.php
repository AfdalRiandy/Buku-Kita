<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username == 'admin' && $request->password == 'admin') {
            // Set session untuk autentikasi sederhana
            session(['is_admin' => true]);
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        }
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('home');
    }
}