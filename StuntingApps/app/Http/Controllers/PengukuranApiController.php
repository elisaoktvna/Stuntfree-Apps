<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Edukasi;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PengukuranApiController extends Controller
{
    public function index()
    {
        $pengukuran = Pengukuran::with('anak')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $pengukuran
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anak' => 'required|exists:anak,id',
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'usia_bulan' => 'required|integer',
        ]);

        $anak = Anak::find($validatedData['id_anak']);
        $jenis_kelamin = $anak->jenis_kelamin;

        $response = Http::post('http://localhost:5000/predict_gizi', [
            'jenis_kelamin' => $jenis_kelamin,
            'tinggi_badan_cm' => $request->tinggi,
            'berat_badan_kg' => $request->berat,
            'umur_bulan' => $request->usia_bulan,
        ]);

        if (!$response->successful()) {
            return response()->json(['success' => false, 'message' => 'Gagal terhubung ke model Flask'], 500);
        }

        $result = $response->json();

        $pengukuran = Pengukuran::create([
            'id_anak' => $request->id_anak,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'usia_bulan' => $request->usia_bulan,
            'zs_tbu' => $result['zscore_tb_u'] ?? null,
            'hasil' => $result['hasil_model'] ?? null,
            'bmi' => $result['bmi'] ?? null,
            'zs_bmi_u' => $result['zscore_bmi_u'] ?? null,
            'status_gizi_bmi' => $result['status_gizi_bmi'] ?? null,
            'note' => $result['note'] ?? null,
        ]);

        $kategori = $result['hasil_model'] ?? null;

        if($kategori) {
            $template = DB::table('template_edukasi')->where('kategori', $kategori)->first();

            if ($template) {
                Edukasi::create([
                    'id_anak' => $validatedData['id_anak'],
                    'id_pengukuran' => $pengukuran->id,
                    'judul' => $template->judul,
                    'content' => $template->content,
                    'kategori' => $template->kategori,
                    'image' => $template->image,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengukuran berhasil disimpan!',
            'data' => $pengukuran
        ]);
    }

}
