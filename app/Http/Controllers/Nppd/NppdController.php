<?php

namespace App\Http\Controllers\Nppd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Nppd, Anggaran, KodeRekening, Spt, User};
// use App\Models\NppdUser;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class NppdController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $nppds = Spt::get();
        } else {
            $nppds = Spt::whereHas('spt_user', function($q){
                $q->where('user_id', Auth::user()->id);
            })->get();
        }
        return view('nppd.index', [
            'nppds' => Nppd::find($user),
            'nppds' => $nppds
        ]);
    }

    public function create()
    {
        $this->authorize('create');
        return view('nppd.create', [
            'spts' => Spt::get(),
            'anggarans' => Anggaran::get(),
            'kode_rekenings' => KodeRekening::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create');
        $validateData = $request->validate([
            'kepada' => ['required', 'string', 'max:50'],
            'dari' => ['required', 'string', 'max:100'],
            'prihal' => ['required', 'string', 'max:50'],
            'spt_id' => ['required'],
            'anggaran_id' => ['required'],
        ]);
        Nppd::create($validateData);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    public function edit(Nppd $nppd)
    {
        $this->authorize('edit');
        return view('nppd.edit', [
            'nppd' => $nppd,
            'spts' => Spt::get(),
            'anggarans' => Anggaran::get(),
        ]);
    }

    public function update(Request $request, Nppd $nppd)
    {
        $this->authorize('edit');
        $validateData = $request->validate([
            'kepada' => ['required', 'string', 'max:50'],
            'dari' => ['required', 'string', 'max:100'],
            'prihal' => ['required', 'string', 'max:50'],
            'anggaran_id' => ['required'],
        ]);

        $nppd->update($validateData);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    public function destroy(Nppd $nppd)
    {
        $this->authorize('delete');
        $nppd->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Hapus'
        ]);
    }

    public function status(Nppd $nppd)
    {
        $nppd->update(request()->all());
        return redirect()->back()->withSuccess('Status Berhasil Diubah');
    }

    public function print($id)
    {
        $nppd = Nppd::findOrFail($id);

        // Pergi
        $time_datang = Carbon::parse($nppd->tgl_pergi)->locale('id');
        $time_datang->settings(['formatFunction' => 'translatedFormat']);
        //Pulang
        $time_pulang = Carbon::parse($nppd->tgl_pulang)->locale('id');
        $time_pulang->settings(['formatFunction' => 'translatedFormat']);

        $day = $time_datang->format('l') .' s/d ' . $time_pulang->format('l'); // Selasa, 16 Maret 2021 ; 08:27 pagi

        // return view('nppd.print', [
        //     'nppds' => NppdUser::where('nppd_id', $id)->get(),
        //     'nppd' => $nppd,
        //     'locations' => Locations::findOrFail($id),
        //     'rekening' => KodeRekening::findOrFail($id),
        //     'day' => $day
        // ]);

        $pdf = Pdf::loadView('nppd.print', [
            'nppd' => $nppd,
            'rekening' => KodeRekening::findOrFail($id),
            'day' => $day
        ]);
        return $pdf->download('nota dinas.pdf');
    }
}
