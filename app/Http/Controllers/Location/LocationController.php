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
        $this->authorize('read');
        return view('location.index',['locations' => Locations::get()]);
    }

    public function create()
    {
        $this->authorize('create');
        return view('location.create');
    }

    public function store(Request $request, Locations $locations)
    {
        $this->authorize('create');
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:locations']
        ]);

        Locations::create($data);
        return redirect()->route('location.index')->withSuccess('Berhasil Tambah Data Kota');
    }

    public function edit(Locations $location)
    {
        $this->authorize('edit');
        return view('location.edit', ['location' => $location]);
    }

    public function update(Request $request, Locations $location)
    {
        $this->authorize('edit');
        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('locations')->ignore($location->id)]
        ]);

        $location->update($data);
        return redirect()->route('location.index')->withSuccess('Berhasil Ubah Lokasi');
    }

    public function destroy(Locations $location)
    {
        $this->authorize('delete');
        $location->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
