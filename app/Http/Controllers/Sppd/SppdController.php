<?php

namespace App\Http\Controllers\Sppd;

use App\Models\{Sppd, Spt, User};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SppdController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $sppds = Sppd::get();
        } else {
            $sppds = Sppd::whereHas('spt_user', function($q){
                $q->where('user_id', Auth::user()->id);
            })->get();
        }
        return view('sppd.index', [
            'sppds' => Sppd::find($user),
            'sppds' => $sppds
        ]);
    }

    public function create(Spt $spt)
    {
        $this->authorize('create');
        return view('sppd.create', ['spts' => $spt]);
    }

    public function store(Request $request)
    {
        $this->authorize('create');
        $request->validate([
            'tempat_berangkat' => ['required', 'string', 'max:50'],
            'instansi' => ['required', 'string', 'max:50'],
            'mata_anggaran' => ['required', 'string', 'max:50'],
            'keterangan' => ['required', 'string', 'max:50'],
        ]);

        Sppd::create([
            'tempat_berangkat' => $request->tempat_berangkat,
            'instansi' => $request->instansi,
            'mata_anggaran' => $request->mata_anggaran,
            'keterangan' => $request->keterangan,
            'nomor' => $request->nomor,
            'spt_id' => $request->spt_id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('sppd.index')->withSuccess('Berhasil Menambah SPPD');
    }

    public function show($id)
    {
        //
    }

    public function edit(Sppd $sppd)
    {
        $this->authorize('edit');
        return view('sppd.edit', ['sppd' => $sppd]);
    }

    public function update(Request $request, Sppd $sppd)
    {
        $this->authorize('edit');
        $request->validate([
            'tempat_berangkat' => ['required', 'string', 'max:50'],
            'instansi' => ['required', 'string', 'max:50'],
            'mata_anggaran' => ['required', 'string', 'max:50'],
            'keterangan' => ['required', 'string', 'max:50'],
        ]);

        $sppd->update([
            'tempat_berangkat' => $request->tempat_berangkat,
            'instansi' => $request->instansi,
            'mata_anggaran' => $request->mata_anggaran,
            'keterangan' => $request->keterangan,
            'nomor' => $request->nomor,
            'spt_id' => $request->spt_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('sppd.index')->withSuccess('Berhasil Ubah SPPD');
    }

    public function destroy(Sppd $sppd)
    {
        $this->authorize('delete');
        $sppd->delete();
        return response()->json([
            'status' => 'success',
            'Message' => 'Berhasil Hapus'
        ]);
    }
}
