<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Edukasi;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::all();
        return view('edukasi.edukasi', compact('edukasis'));
    }

    public function create()
    {
            $anak = Anak::all();
            $pengukuran = Pengukuran::with('anak')->get(); // Jika ingin menampilkan anak juga

            return view('edukasi.create', compact('anak', 'pengukuran'));
    }


        public function store(Request $request)
        {
            $request->validate([
                'id_anak' => 'required|exists:anak,id',
                'id_pengukuran' => 'required|exists:pengukuran,id',
                'judul' => 'required|max:150',
                'content' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png',
            ]);

            $pengukuran = Pengukuran::findOrFail($request->id_pengukuran);

            // Misalnya status_gizi: 'stunting', 'normal', atau 'tall'
            $kategori = $pengukuran->hasil;

            $imagePath = $request->file('image')->store('image', 'public');

            Edukasi::create([
                'id_anak' => $request->id_anak,
                'id_pengukuran' => $request->id_pengukuran,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $kategori,
                'image' => $imagePath,
            ]);

            return redirect()->route('templateedukasi.index')->with('success', 'Edukasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:150',
            'content' => 'required',
            'kategori' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $edukasi = Edukasi::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($edukasi->image) {
                Storage::delete('public/' . $edukasi->image);
            }

            $imagePath = $request->file('image')->store('image', 'public');
        } else {
            $imagePath = $edukasi->image;
        }

        $edukasi->update([
            'judul' => $request->judul,
            'content' => $request->content,
            'kategori' => $request->kategori,
            'image' => $imagePath,
        ]);

        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $edukasi = Edukasi::findOrFail($id);

        if ($edukasi->image) {
            Storage::delete('public/' . $edukasi->image);
        }

        $edukasi->delete();

        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil dihapus.');
    }
}
