<?php

namespace App\Http\Controllers\Nppd;

use App\Models\User;
use App\Models\Locations;
use App\Models\Transports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nppd;
use Illuminate\Support\Facades\Auth;

class NppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $get_data = Nppd::all();
        } else {
            $get_data = Nppd::whereHas('nppd_user', function($q){
                $q->where('user_id', Auth::user()->id);
            })->get();
        }

        return view('nppd.index', [
            'nppds' => $get_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nppd.create', [
            'users' => User::all(),
            'locations' => Locations::all(),
            'transports' => Transports::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
            'nomor' => ['nullable'],
        ]);
        $nppd = Nppd::create($validateData);
        $nppd->user()->attach($request->user);
        $nppd->location()->attach($request->location);
        $nppd->transport()->attach($request->transport);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nppd $nppd)
    {
        return view('nppd.edit', [
            'nppd' => Nppd::findOrFail($nppd->id),
            'users' => User::all(),
            'locations' => Locations::all(),
            'transports' => Transports::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nppd $nppd)
    {
        $validateData = $request->validate([
            'tujuan' => ['required', 'max:50', 'string'],
            'tgl_pergi' => ['required', 'date'],
            'tgl_pulang' => ['required', 'date'],
        ]);

        $nppd->update($validateData);
        $nppd->user()->sync($request->user);
        $nppd->location()->sync($request->location);
        $nppd->transport()->sync($request->transport);

        return redirect()->route('nppd.index')->withSuccess('Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nppd $nppd)
    {
        $nppd->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
