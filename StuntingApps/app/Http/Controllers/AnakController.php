<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use App\Models\User;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakController extends Controller
{
    // public function index()
    // {
    //     $ortuid = Auth::id();

    //     $anak = Anak::where('id_orangtua', $ortuid)->get();

    //     // $anak = Anak::with('ortu')->get();
    //     return view('anak.anak', compact('anak'));
    // }

    public function index ()
    {
        if(Auth::guard('web')->check()){
            $anak = Anak::with('ortu')->get();
            return view('anak.anak', compact('anak'));
        }

        if (Auth::guard('ortu')->check()){
            $ortuid = Auth::guard('ortu')->id();
            $anak = Anak::where('id_orangtua', $ortuid)->get();
            return view('anak.ortu-chart', compact('anak'));
        }

        return redirect('/');
    }

    public function create()
    {
        if (Auth::guard('web')->check()) {
        // Admin bisa pilih ortu
        $ortu = Ortu::all();
        return view('anak.addanak', compact('ortu'));
        }

        if (Auth::guard('ortu')->check()) {
            // Ortu otomatis, tanpa perlu pilih
            return view('anak.addanak'); // tanpa data ortu
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        // Kalau admin, id_orangtua wajib diisi dari form
        // Kalau ortu, id_orangtua diisi otomatis dari user login

        if (Auth::guard('web')->check()) {
            $validated = $request->validate([
                'nik' => 'required',
                'nama' => 'required|max:100',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                'id_orangtua' => 'required',
            ]);
        } elseif (Auth::guard('ortu')->check()) {
            $validated = $request->validate([
                'nik' => 'required',
                'nama' => 'required|max:100',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                // 'id_orangtua' tidak perlu input, karena ambil dari login
            ]);

            // Set id_orangtua dari user ortu yang login
            $validated['id_orangtua'] = Auth::guard('ortu')->id();
        } else {
            return redirect('/');
        }

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
        $anak = Anak::with(['ortu', 'latestEdukasi', 'pengukuran' => function($q) {
            $q->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('anak.detailanak', compact('anak'));
    }

    public function showEdukasi($anakId, $edukasiId)
    {
        $anak = Anak::findOrFail($anakId);
        $edukasi = $anak->edukasi()->findOrFail($edukasiId); // Asumsi relasi 'edukasi' ada di model Anak

        $otherEdukasi = $anak->edukasi()
                            ->where('id', '!=', $edukasiId)
                            ->latest()
                            ->limit(5)
                            ->get();

        return view('anak.detailberitaanak', compact('anak', 'edukasi', 'otherEdukasi'));
    }

            public function pengukuran()
        {
            return $this->hasMany(Pengukuran::class, 'id_anak');
        }

}
