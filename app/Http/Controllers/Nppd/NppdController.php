<?php

namespace App\Http\Controllers\Nppd;

use App\Models\User;
use App\Models\Locations;
use App\Models\Transports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggaran;
use App\Models\Nppd;
use App\Models\NppdUser;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class NppdController extends Controller
{
    public function index()
    {
        // $this->authorize('read');
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
        $this->authorize('create');
        return view('nppd.create', [
            'users' => User::get(),
            'locations' => Locations::get(),
            'transports' => Transports::get(),
            'anggarans' => Anggaran::get()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create');
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
        $this->authorize('edit');
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
        $this->authorize('edit');
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
        $this->authorize('delete');
        $nppd->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }

    public function status(Nppd $nppd)
    {
        $nppd->update(request()->all());
        return redirect()->back()->withSuccess('Status Berhasil Diubah');
    }

    public function print($id)
    {
        $get_id = Nppd::find($id);
        $get_loc = Locations::find($id);
        $get_nppd = NppdUser::where('nppd_id', $id)->get();

        // Pergi
        $time_datang = Carbon::parse($get_id->tgl_pergi)->locale('id');
        $time_datang->settings(['formatFunction' => 'translatedFormat']);
        //Pulang
        $time_pulang = Carbon::parse($get_id->tgl_pulang)->locale('id');
        $time_pulang->settings(['formatFunction' => 'translatedFormat']);

        $day = $time_datang->format('l') .' s/d ' . $time_pulang->format('l'); // Selasa, 16 Maret 2021 ; 08:27 pagi

        // return view('nppd.print', [
        //     'nppd_for' => $get_nppd,
        //     'get_id' => $get_id,
        //     'get_loc' => $get_loc,
        //     'day' => $day
        // ]);

        $pdf = Pdf::loadView('nppd.print', [
            'nppd_for' => $get_nppd,
            'get_id' => $get_id,
            'get_loc' => $get_loc,
            'day' => $day
        ])->setPaper('a4', 'potrait');

        // dd($pdf);
        return $pdf->download('invoice.pdf');
    }
}
