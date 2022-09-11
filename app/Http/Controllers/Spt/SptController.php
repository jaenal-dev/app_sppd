<?php

namespace App\Http\Controllers\Spt;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{KodeRekening, Spt, User, Locations, Pejabat, SptUser, Transports};

class SptController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $spts = Spt::get();
        } else {
            $spts = Spt::whereHas('spt_user', function($q){
                $q->where('user_id', Auth::user()->id);
            })->get();
        }
        return view('spt.index', compact('spts'));
    }

    public function create()
    {
        $this->authorize('create');
        return view('spt.create', [
            'users' => User::get(),
            'locations' => Locations::get(),
            'transports' => Transports::get(),
            'kode_rekenings' => KodeRekening::get(),
            'pejabats' => Pejabat::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create');
        $validatedData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
            'pejabat_id' => ['required'],
            'kode_rekenings_id' => ['required'],
            'nomor' => ['nullable'],
        ]);
        $spt = Spt::create($validatedData);
        $spt->user()->attach($request->user);
        $spt->location()->attach($request->location);
        $spt->transport()->attach($request->transports);
        return redirect()->route('spt.index')->withSuccess('Berhasil');
    }

    public function show($id)
    {
        $spt = Spt::findOrFail($id);

        $time_datang = Carbon::parse($spt->tgl_pergi)->locale('id');
        $time_datang->settings(['formatFunction' => 'translatedFormat']);
        //Pulang
        $time_pulang = Carbon::parse($spt->tgl_pulang)->locale('id');
        $time_pulang->settings(['formatFunction' => 'translatedFormat']);

        $day = $time_datang->format('l') .' s/d ' . $time_pulang->format('l'); // Selasa, 16 Maret 2021 ; 08:27 pagi

        return view('spt.show', [
            'spts' => $spt,
            'spt_user' => SptUser::where('spt_id', $id)->get()
        ]);
    }

    public function edit(Spt $spt)
    {
        $this->authorize('edit');
        return view('spt.edit', [
            'spt' => $spt,
            'users' => User::get(),
            'locations' => Locations::get(),
            'transports' => Transports::get(),
            'pejabats' => Pejabat::get(),
            'kode_rekenings' => KodeRekening::get(),
        ]);
    }

    public function update(Request $request, Spt $spt)
    {
        $this->authorize('edit');
        $validatedData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
            'pejabat_id' => ['required'],
            'kode_rekenings_id' => ['required'],
            'nomor' => ['nullable'],
        ]);

        $spt->update($validatedData);
        $spt->user()->sync($request->user);
        $spt->location()->sync($request->location);
        $spt->transport()->sync($request->transports);
        return redirect()->route('spt.index')->withSuccess('Berhasil');
    }

    public function destroy(Spt $spt)
    {
        $this->authorize('delete');
        $spt->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Hapus'
        ]);
    }
}

