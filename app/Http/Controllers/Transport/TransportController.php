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
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:transports']
        ]);

        Transports::create($data);
        return redirect()->route('transport.index')->withSuccess('Berhasil Tambah Data Transport');
    }

    public function edit(Transports $transport)
    {
        return view('transport.edit', [
            'transport' => $transport
        ]);
    }

    public function update(Request $request, Transports $transport)
    {
        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('transports')->ignore($transport->id)]
        ]);

        $transport->update($data);
        return redirect()->route('transport.index')->withSuccess('Berhasil Ubah Transport');
    }

    public function destroy(Transports $transport)
    {
        $transport->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus');
    }
}
