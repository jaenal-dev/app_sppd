<?php

namespace App\Http\Controllers\Anggaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function index()
    {
        return view('anggaran.index', [
            'anggarans' => Anggaran::get()
        ]);
    }

    public function create()
    {
        return view('anggaran.create');
    }

    public function store(Request $request)
    {
        Anggaran::create($request->all());
        return redirect()->route('anggaran.index')->withSuccess('Berhasil Tambah');
    }

    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Hapus'
        ]);
    }
}
