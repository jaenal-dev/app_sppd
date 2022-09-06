<?php

namespace App\Http\Controllers\Anggaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function index()
    {
        $this->authorize('read');
        return view('anggaran.index', [
            'anggarans' => Anggaran::get()
        ]);
    }

    public function create()
    {
        $this->authorize('create');
        return view('anggaran.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create');
        Anggaran::create($request->all());
        return redirect()->route('anggaran.index')->withSuccess('Berhasil Tambah');
    }

    public function destroy(Anggaran $anggaran)
    {
        $this->authorize('delete');
        $anggaran->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Hapus'
        ]);
    }
}
