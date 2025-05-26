<?php

namespace App\Http\Controllers;

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
}
