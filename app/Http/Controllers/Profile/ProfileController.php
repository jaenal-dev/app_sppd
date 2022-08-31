<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'nip' => ['required', 'size:10', Rule::unique('users')->ignore(auth()->user()->id)],
            'jenis_kelamin' => ['required', 'in:P,L'],
            'image' => ['nullable', 'mimes:png,jpg', 'max:2048'],
            'pangkat' => ['nullable', 'string', 'max:50'],
            'esselon' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->file('image')) {
            Storage::delete(auth()->user()->image);
            $image = request()->file('image')->store('user');
        } elseif (auth()->user()->image) {
            $image = auth()->user()->image;
        } else {
            $image = null;
        }

        Auth::user()->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pangkat' => $request->pangkat,
            'esselon' => $request->esselon,
            'image' => $image,
        ]);

        return redirect()->route('dashboard')->withSuccess('Profil ' . auth()->user()->name . ' Berhasil Diubah');
    }
}
