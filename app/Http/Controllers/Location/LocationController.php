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
        return view('location.index',[
            'locations' => Locations::all()
        ]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request, Locations $locations)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:locations']
        ]);

        Locations::create([
            'name' => $request->name
        ]);
        return redirect()->route('location.index')->withSuccess('Berhasil Tambah Data Kota');
    }

    public function edit(Locations $location)
    {
        return view('location.edit', [
            'location' => Locations::findOrFail($location->id)
        ]);
    }

    public function update(Request $request, Locations $location)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('locations')->ignore($location->id)]
        ]);

        Locations::findOrFail($location->id)->update(['name' => $request->name]);
        return redirect()->route('location.index')->withSuccess('Berhasil Ubah Lokasi');
    }

    public function destroy(Locations $location)
    {
        $location->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
