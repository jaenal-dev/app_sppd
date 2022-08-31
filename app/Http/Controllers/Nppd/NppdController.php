<?php

namespace App\Http\Controllers\Nppd;

use App\Models\User;
use App\Models\Locations;
use App\Models\Transports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggaran;
use App\Models\Nppd;
use Illuminate\Support\Facades\Auth;

class NppdController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $nppds = Nppd::latest()->get();
        } else {
            $nppds = Nppd::whereHas('nppd_user', function($q){
                $q->where('user_id', Auth::user()->id);
            })->get();
        }

        return view('nppd.index', ['nppds' => $nppds]);
    }

    public function create()
    {
        return view('nppd.create', [
            'users' => User::get(),
            'locations' => Locations::get(),
            'transports' => Transports::get(),
            'anggarans' => Anggaran::get()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
            'anggaran_id' => ['required'],
            'nomor' => ['nullable'],
        ]);
        $nppd = Nppd::create($validateData);
        $nppd->user()->attach($request->user);
        $nppd->location()->attach($request->location);
        $nppd->transport()->attach($request->transport);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    public function edit(Nppd $nppd)
    {
        return view('nppd.edit', [
            'nppd' => $nppd,
            'users' => User::get(),
            'anggarans' => Anggaran::get(),
            'locations' => Locations::get(),
            'transports' => Transports::get()
        ]);
    }

    public function update(Request $request, Nppd $nppd)
    {
        $validateData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
            'anggaran_id' => ['required'],
            'nomor' => ['nullable'],
        ]);

        $nppd->update($validateData);
        $nppd->user()->sync($request->user);
        $nppd->location()->sync($request->location);
        $nppd->transport()->sync($request->transport);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    public function destroy(Nppd $nppd)
    {
        $nppd->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }

    public function status(Nppd $nppd)
    {
        $nppd->update(request()->all());
        return redirect()->back()->withSuccess('Status Berhasil Diubah');
    }
}
