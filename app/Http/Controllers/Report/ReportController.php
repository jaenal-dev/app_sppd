<?php

namespace App\Http\Controllers\Report;

use App\Models\{Nppd, Report};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $nppds = Report::get();
        } else {
            $nppds = Report::where('user_id', Auth::user()->id)->get();
        }
        return view('report.index', ['nppds' => $nppds]);
    }

    public function create(Nppd $nppd)
    {
        return view('report.create', ['nppds' => $nppd]);
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

    public function edit(Report $report)
    {
        return view('report.edit', ['report' => $report]);
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'laporan' => ['required']
        ]);

        $report->update([
            'nppd_id' => $request->nppd_id,
            'nomor' => $request->nomor,
            'laporan' => $request->laporan,
            'user_id' => Auth::user()->id,
        ]);

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
