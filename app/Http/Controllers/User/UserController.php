<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('read');
        return view('user.index', [
            'users' => User::paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('create');
        return view('user.create');
    }

    public function store(Request $request, User $user)
    {
        $this->authorize('create');
        $validateData = $request()->validate([
            'name' => ['required', 'string', 'max:50'],
            'nip' => ['required', 'string', 'unique:users'],
            'jenis_kelamin' => ['required', 'in:P,L'],
            'email' => ['required', 'email', 'unique:users'],
            'jabatan' => ['required', 'string', 'max:50'],
            'esselon' => ['required', 'string', 'max:10'],
        ]);

        User::create($validateData);
        return redirect()->back()->withSuccess('Berhasil Tambah User');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete');
        $user->delete();
        return redirect()->back()->withSuccess($user->name . 'Berhasil Dihapus');
    }
}
