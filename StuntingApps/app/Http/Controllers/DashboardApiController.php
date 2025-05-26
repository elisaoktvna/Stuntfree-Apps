<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardApiController extends Controller
{
    public function index(Request $request)
{
    $request->validate([
        'id_orangtua' => 'required|integer|exists:ortus,id',
    ]);

    $ortuId = $request->input('id_orangtua');

    $anakList = Anak::with([
        'ortu.kecamatan',
        'latestEdukasi',
        'pengukuran' => function ($query) {
            $query->orderByDesc('usia_bulan')->limit(1);
        }
    ])
    ->where('id_orangtua', $ortuId)
    ->get();

    $data = $anakList->map(function ($anak) {
        $pengukuran = $anak->pengukuran->first();
        $edukasi = $anak->latestEdukasi;

        return [
            'id' => $anak->id,
            'nik' => $anak->nik,
            'nama' => $anak->nama,
            'jenis_kelamin' => $anak->jenis_kelamin,
            'tanggal_lahir' => $anak->tanggal_lahir,
            'status' => $anak->status,
            'ortu' => [
                'nama' => $anak->ortu?->nama,
                'email' => $anak->ortu?->email,
                'kecamatan' => $anak->ortu?->kecamatan?->nama,
                'alamat' => $anak->ortu?->alamat,
            ],
            'pengukuran_terbaru' => $pengukuran ? [
                'berat' => $pengukuran->berat,
                'tinggi' => $pengukuran->tinggi,
                'usia_bulan' => $pengukuran->usia_bulan,
                'zs_tbu' => $pengukuran->zs_tbu,
                'hasil' => $pengukuran->hasil,
                'bmi' => $pengukuran->bmi,
                'status_gizi_bmi' => $pengukuran->status_gizi_bmi,
                'note' => $pengukuran->note,
            ] : null,
            'edukasi_terbaru' => $edukasi ? [
                'judul' => $edukasi->judul,
                'content' => $edukasi->content,
                'kategori' => $edukasi->kategori,
                'image' => $edukasi->image,
            ] : null,
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data,
    ]);
}


}
