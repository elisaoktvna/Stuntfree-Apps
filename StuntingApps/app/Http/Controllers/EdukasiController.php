<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data edukasi
        $edukasis = Edukasi::all();
        return view('edukasi.edukasi', compact('edukasis'));
    }

    public function create()
    {
        return view('edukasi.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan dari pengguna
        $request->validate([
            'judul' => 'required|max:150',
            'konten' => 'required',  // Changed to match form field name
            'gambar' => 'required|image|mimes:jpg,jpeg,png'  // Changed to match form field name
        ]);

        // Cek jika ada file gambar yang di-upload
        if ($request->hasFile('gambar')) {  // Changed to match form field name
            // Menyimpan file gambar ke storage
            $imagePath = $request->file('gambar')->store('image', 'public');  // Changed to match form field name
        } else {
            $imagePath = null; // Jika tidak ada gambar, set null
        }

        // Menyimpan data edukasi ke database
        Edukasi::create([
            'judul' => $request->judul,
            'content' => $request->konten,  // Changed to match form field name
            'image' => $imagePath,  // Pastikan menyimpan path gambar
        ]);

        // Mengarahkan ke halaman edukasi dengan pesan sukses
        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan dari pengguna
        $request->validate([
            'judul' => 'required|max:150',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png' // Image menjadi nullable
        ]);

        // Cari data edukasi berdasarkan id
        $edukasi = Edukasi::findOrFail($id);

        // Cek apakah ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($edukasi->image) {
                Storage::delete('public/' . $edukasi->image);
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image')->store('image', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imagePath = $edukasi->image;
        }

        // Update data edukasi
        $edukasi->update([
            'judul' => $request->judul,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Cari data edukasi berdasarkan id
        $edukasi = Edukasi::findOrFail($id);

        // Hapus gambar jika ada
        if ($edukasi->image) {
            Storage::delete('public/' . $edukasi->image);
        }

        // Hapus data edukasi
        $edukasi->delete();

        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil dihapus.');
    }
}
