<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back()->with('error', 'Periksa data kembali');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
