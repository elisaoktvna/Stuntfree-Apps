<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use Illuminate\Http\Request;

class FaskesApiController extends Controller
{
    public function index(Request $request) {
        {
            
        $query = Faskes::with('kecamatan');

        if ($request->has('id_kecamatan')) {
            $query->where('id_kecamatan', $request->id_kecamatan);
        }

        $faskes = $query->get();

        return response()->json([
            'status' => true,
            'message' => 'Data faskes berhasil diambil',
            'data' => $faskes
        ]);
    }
    }
}
