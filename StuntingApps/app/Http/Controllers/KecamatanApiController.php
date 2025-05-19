<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanApiController extends Controller
{
    public function index()
    {
        $data = Kecamatan::select('id', 'nama')->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
