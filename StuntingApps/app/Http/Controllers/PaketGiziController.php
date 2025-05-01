<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketGizi;

class PaketGiziController extends Controller
{
    /**
     * Tampilkan semua data paket gizi.
     */
    public function index()
    {
        $paketgizi = PaketGizi::all();
        return view('paketgizi.paketgizi', compact('paketgizi'));
    }

    /**
     * Tampilkan form untuk tambah paket gizi.
     */
    public function create()
    {
        return view('paketgizi.addpaketgizi');
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'urlmaps' => 'required|url',
        ]);

        PaketGizi::create($request->all());

        return redirect()->route('paketgizi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit($id)
    {
        $paketgizi = PaketGizi::findOrFail($id);
        return view('paketgizi.editpaketgizi', compact('paketgizi'));
    }

    /**
     * Proses update data.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'urlmaps' => 'required|url',
        ]);

        $paketgizi = PaketGizi::findOrFail($id);
        $paketgizi->update($request->all());

        return redirect()->route('paketgizi.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $paketgizi = PaketGizi::findOrFail($id);
        $paketgizi->delete();

        return redirect()->route('paketgizi.index')->with('success', 'Data berhasil dihapus');
    }
}
