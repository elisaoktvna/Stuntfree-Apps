<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengukuranApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_anak' => 'required|exists:anak,id',
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'usia_bulan' => 'required|integer',
        ]);

        $anak = Anak::find($validated['id_anak']);
        $jenis_kelamin = $anak->jenis_kelamin;

        try {
            $response = Http::post('http://localhost:5000/predict_stunting', [
                'jenis_kelamin' => $jenis_kelamin,
                'tinggi_badan_cm' => $validated['tinggi'],
                'berat_badan_kg' => $validated['berat'],
                'umur_bulan' => $validated['usia_bulan'],
            ]);

            if (!$response->successful()) {
                return response()->json(['message' => 'Gagal prediksi. Cek koneksi ke Flask API.'], 500);
            }

            $result = $response->json();

            $pengukuran = Pengukuran::create([
                'id_anak' => $validated['id_anak'],
                'berat' => $validated['berat'],
                'tinggi' => $validated['tinggi'],
                'usia_bulan' => $validated['usia_bulan'],
                'zs_tbu' => $result['zscore_tb_u'] ?? null,
                'hasil' => $result['hasil_model'] ?? null,
                'bmi' => $result['bmi'] ?? null,
                'zs_bmi_u' => $result['zscore_bmi_u'] ?? null,
                'status_gizi_bmi' => $result['status_gizi_bmi'] ?? null,
                'note' => $result['note'] ?? null,
            ]);

            return response()->json([
                'message' => 'Data pengukuran berhasil disimpan.',
                'data' => $pengukuran
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
