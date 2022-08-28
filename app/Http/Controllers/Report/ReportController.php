<?php

namespace App\Http\Controllers\Report;

use App\Models\Nppd;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $nppds = Report::all();
        } else {
            $nppds = Report::where('user_id', Auth::user()->id)->get();
        }
        return view('report.index', compact('nppds'));
    }

    public function create($id)
    {
        return view('report.create', [
            'nppds' => Nppd::find($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'laporan' => ['required']
        ]);
        Report::create([
            'nppd_id' => $request->nppd_id,
            'nomor' => $request->nomor,
            'laporan' => $request->laporan,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('report.index')->withSuccess('Berhasil Buat Laporan');
    }

    public function edit($id)
    {
        return view('report.edit', [
            'report' => Report::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'laporan' => ['required']
        ]);
        Report::findOrFail($id)->update([
            'nppd_id' => $request->nppd_id,
            'nomor' => $request->nomor,
            'laporan' => $request->laporan,
            'user_id' => Auth::user()->id,
        ]);
        // dd('Berhasil Mantap');
        return redirect()->route('report.index')->withSuccess('Berhasil Ubah Laporan');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus Laporan');
    }

    public function print()
    {
        return view('report.print');
    }
}
