<?php

namespace App\Http\Controllers;


use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.kecamatan', compact('kecamatan'));
    }

    public function create()
    {
        return view('kecamatan.addkecamatan');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required',
    ]);

    $kecamatan = new Kecamatan();
    $kecamatan->nama = $request->nama;
    $kecamatan->save();

    return redirect('/kecamatan')->with('success', 'Kecamatan berhasil ditambahkan');
}

    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.editkecamatan', compact('kecamatan'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate(['nama' => 'required']);
        $kecamatan->update(['nama' => $request->nama]);
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diperbarui');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus');
    }
}