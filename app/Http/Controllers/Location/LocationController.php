<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    public function index()
    {
        return view('location.index',['locations' => Locations::get()]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request, Locations $locations)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:locations']
        ]);

        Locations::create($data);
        return redirect()->route('location.index')->withSuccess('Berhasil Tambah Data Kota');
    }

    public function edit(Locations $location)
    {
        return view('location.edit', ['location' => $location]);
    }

    public function update(Request $request, Locations $location)
    {
        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('locations')->ignore($location->id)]
        ]);

        $location->update($data);
        return redirect()->route('location.index')->withSuccess('Berhasil Ubah Lokasi');
    }

    public function destroy(Locations $location)
    {
        $location->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
