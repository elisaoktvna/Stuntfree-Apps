<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data faskes dari tabel faskes atau paketgizi
        $faskes = DB::table('faskes')->take(3)->get(); // atau table 'faskes'

        // Kirim ke view landing page
        return view('landingpage', compact('faskes'));
    }

    public function tampilpaket()
    {
        $paketgizi = DB::table('paketgizi')->get();

        return view('paketgizi.paket', compact('paketgizi'));
    }

    public function tampilfaskeslengkap(Request $request){
       $kecamatanList = Faskes::with('kecamatan')
        ->get()
        ->pluck('kecamatan.nama', 'kecamatan.id')
        ->unique();

    // Query menggunakan model Faskes
    $query = Faskes::with('kecamatan');

    if ($request->has('kecamatan') && $request->kecamatan != '') {
        $query->whereHas('kecamatan', function ($q) use ($request) {
            $q->where('nama', $request->kecamatan);
        });
    }

    $faskes = $query->get();

    return view('faskes.fasilitaskesehatan', [
        'faskes' => $faskes,
        'kecamatans' => $kecamatanList,
        'selectedKecamatan' => $request->kecamatan
    ]);
    }
}
