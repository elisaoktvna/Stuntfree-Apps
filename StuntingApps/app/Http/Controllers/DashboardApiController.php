<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Support\Facades\Auth;

class DashboardApiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua anak milik orang tua yang sedang login
        $anakList = Anak::where('id_ortu', $user->id)
            ->with(['pengukuran' => function($query) {
                $query->latest()->limit(1);
            }])
            ->get();

        // Format data untuk dashboard
        $data = $anakList->map(function ($anak) {
            $latest = $anak->pengukuran->first();

            return [
                'id' => $anak->id,
                'nama' => $anak->nama,
                'jenis_kelamin' => $anak->jenis_kelamin,
                'tanggal_lahir' => $anak->tanggal_lahir,
                'usia_bulan' => $latest?->usia_bulan,
                'berat' => $latest?->berat,
                'tinggi' => $latest?->tinggi,
                'z_score' => $latest?->zs_tbu,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}
