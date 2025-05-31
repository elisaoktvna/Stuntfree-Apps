<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PaketGizi;
use Illuminate\Http\Request;

class PaketGiziApiController extends Controller
{
    /**
     * Menampilkan semua data dari koleksi paketgizi (MongoDB).
     */
    public function index()
    {
        $data = PaketGizi::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Paket Gizi berhasil diambil',
            'data' => $data,
        ], 200);
    }
}
