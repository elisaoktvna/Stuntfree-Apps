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
        $pengukuran = Pengukuran::all();

    return view('edukasi.create', compact('anak', 'pengukuran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:150',
            'content' => 'required',  // Sesuai form
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',  // Sesuai form
        ]);

        if ($request->hasFile('image')) {  // Cek file 'image'
            $imagePath = $request->file('image')->store('image', 'public');
        } else {
            $imagePath = null;
        }

        Edukasi::create([
            'judul' => $request->judul,
            'content' => $request->content,  // Sesuai form
            'kategori' => $request->kategori,
            'image' => $imagePath,
        ]);

        return redirect()->route('edukasi.index')->with('success', 'Edukasi berhasil ditambahkan.');
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
