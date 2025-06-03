<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    public function index()
    {
        $faskess = Faskes::with('kecamatan')->get();
        return view('faskes.faskes', compact('faskess'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('faskes.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:150',
            'alamat' => 'required',  // Sesuai form
            'telepon' => 'required|max:12',
            'urlmaps' => 'required|max:150',
            'id_kecamatan' => 'required',
        ]);

        Faskes::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,  // Sesuai form
            'telepon' => $request->telepon,
            'urlmaps' => $request->urlmaps,
            'id_kecamatan' => $request->id_kecamatan,
        ]);

        return redirect()->route('faskes.index')->with('success', 'Faslitas Kesehatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $faskes = Faskes::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('faskes.edit', compact('faskes', 'kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:150',
            'alamat' => 'required',  // Sesuai form
            'telepon' => 'required|max:12',
            'urlmaps' => 'required|max:150',
            'id_kecamatan' => 'required',
        ]);

        $faskes = Faskes::findOrFail($id);

        $faskes->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,  // Sesuai form
            'telepon' => $request->telepon,
            'urlmaps' => $request->urlmaps,
            'id_kecamatan' => $request->id_kecamatan,
        ]);

        return redirect()->route('faskes.index')->with('success', 'Fasilitas Kesehatan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $faskes = Faskes::findOrFail($id);

        $faskes->delete();

        return redirect()->route('faskes.index')->with('success', 'Edukasi berhasil dihapus.');
    }
}
