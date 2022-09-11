<?php

namespace App\Http\Controllers\Pejabat;

use App\Models\Pejabat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PejabatController extends Controller
{
    public function index()
    {
        return view('pejabat.index', [
            'pejabats' => Pejabat::get()
        ]);
    }

    public function create()
    {
        return view('pejabat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'nip' => ['required', 'size:18', 'unique:pejabats'],
            'pangkat' => ['required', 'string', 'max:50'],
            'jabatan' => ['required', 'string', 'max:50']
        ]);

        Pejabat::create($validatedData);
        return redirect()->route('pejabat.index')->withSuccess('Berhasil Menambah Pejabat');
    }

    public function edit(Pejabat $pejabat)
    {
        return view('pejabat.edit', ['pejabat' => $pejabat]);
    }

    public function update(Request $request, Pejabat $pejabat)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'nip' => ['required', 'size:18', Rule::unique('pejabats')->ignore($pejabat->id)],
            'pangkat' => ['required', 'string', 'max:50'],
            'jabatan' => ['required', 'string', 'max:50']
        ]);

        $pejabat->update($validatedData);
        return redirect()->route('pejabat.index')->withSuccess('Berhasil Ubah Pejabat');
    }

    public function destroy(Pejabat $pejabat)
    {
        $pejabat->delete();
        return response()->json([
            'status' => 'success',
            'Message' => 'Berhasil Hapus'
        ]);
    }
}
