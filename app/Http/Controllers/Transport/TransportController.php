<?php

namespace App\Http\Controllers\Transport;

use App\Models\Transports;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TransportController extends Controller
{
    public function index()
    {
        return view('transport.index', [
            'transports' => Transports::paginate(15)
        ]);
    }

    public function create()
    {
        return view('transport.create');
    }

    public function store(Request $request, Transports $transports)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:transports']
        ]);

        Transports::create([
            'name' => $request->name
        ]);
        return redirect()->route('transport.index')->withSuccess('Berhasil Tambah Data Transport');
    }

    public function edit(Transports $transport)
    {
        return view('transport.edit', [
            // dd($transport),
            'transport' => Transports::findOrFail($transport->id)
        ]);
    }

    public function update(Request $request, Transports $transport)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('transports')->ignore($transport->id)]
        ]);

        Transports::findOrFail($transport->id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('transport.index')->withSuccess('Berhasil Ubah Transport');
    }

    public function destroy(Transports $transport)
    {
        Transports::destroy($transport->id);
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
