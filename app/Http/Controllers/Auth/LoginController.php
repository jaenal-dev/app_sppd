<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nip' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($attr)) {
            return redirect()->route('dashboard')->withSuccess('Login Successfully!');
        }
        throw ValidationException::withMessages([
            'nip' => 'Nip atau Password tidak sesuai'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
