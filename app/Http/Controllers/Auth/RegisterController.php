<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip' => ['required', 'string', 'max:25', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:P,L'],
            'image' => ['nullable', 'mimes:png,jpg', 'max:2048'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $validateData['password'] = Hash::make($request->password);
        User::create($validateData);
        return redirect('/')->withSuccess('Berhasil Registrasi');
    }
}
