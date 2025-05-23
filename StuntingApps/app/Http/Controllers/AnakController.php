<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakController extends Controller
{
    public function index()
    {
        $anak = Anak::with('ortu')->get();
        return view('anak.anak', compact('anak'));
    }

    public function create()
    {
        $ortu = Ortu::all();
        return view('anak.addanak', compact('ortu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'id_orangtua' => 'required',
        ]);

        $validated['status'] = 'proses';

        Anak::create($validated);

        return redirect('/anak')->with('success', 'Data anak berhasil ditambahkan');
    }


    public function edit(Anak $anak)
   {
     return view('anak.editanak', compact('anak'));
   }

   public function update(Request $request, Anak $anak)
   {
    $validated = $request->validate([
        'nik' => 'required',
        'nama' => 'required|max:100',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required|date',
        'status' => 'required',
    ]);

    // Memperbarui data anak yang telah tervalidasi
    $anak->update($validated);

    return redirect()->route('anak.index')->with('success', 'Data anak berhasil diperbarui');
   }

   public function destroy(Anak $anak)
   {
     $anak->delete();
     return redirect()->route('anak.index')->with('success', 'Data anak berhasil dihapus');
   }

   public function verifikasi(Anak $anak, $status)
    {
        // Validasi status hanya boleh "Diterima" atau "Ditolak"
        if (!in_array($status, ['diterima', 'ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        // Update status anak
        $anak->update([
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Status anak berhasil diubah menjadi ' . $status);
    }

    // tampil detail anak
    public function show($id)
    {
        $anak = Anak::with('ortu', 'latestEdukasi')->findOrFail($id);

        return view('anak.detailanak', compact('anak'));
    }
}
