<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Edukasi;
use App\Models\Kecamatan;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use App\Models\TemplateEdukasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {
        $templates = TemplateEdukasi::all();
        $totalAnak = Anak::count();
        $totalOrtu = Ortu::count();
        $totalKecamatan = Kecamatan::count();

        $dataStunting = DB::table('pengukuran')
            ->join('anak', 'pengukuran.id_anak', '=', 'anak.id')
            ->join('ortu', 'anak.id_orangtua', '=', 'ortu.id')
            ->join('kecamatan', 'ortu.id_kecamatan', '=', 'kecamatan.id')
            ->select('kecamatan.nama as nama_kecamatan', DB::raw('COUNT(*) as total_stunting'))
            ->whereIn('pengukuran.hasil', ['Stunting', 'Resiko Tinggi Stunting'])
            ->groupBy('kecamatan.nama')
            ->get();

        $labels = $dataStunting->pluck('nama_kecamatan');
        $data = $dataStunting->pluck('total_stunting');

        $pengukuran = DB::table('pengukuran')
            ->join('anak', 'pengukuran.id_anak', '=', 'anak.id')
            ->join('ortu', 'anak.id_orangtua', '=', 'ortu.id')
            ->select(
                'anak.nama as nama_anak',
                'ortu.nama as nama_ortu',
                'pengukuran.usia_bulan',
                'pengukuran.berat',
                'pengukuran.tinggi',
                'pengukuran.status_gizi_bmi',
                'pengukuran.created_at as tanggal_pengukuran'
            )
            ->orderBy('pengukuran.created_at', 'desc')
            ->get();

        $stuntingPerKecamatan = Pengukuran::with('anak.ortu.kecamatan')
            ->where('hasil', 'Stunting')
            ->get()
            ->groupBy(function ($item) {
                return $item->anak->ortu->kecamatan->nama ?? 'Tidak diketahui';
            })
            ->map(function ($group) {
                return $group->count();
            });

        return view('dashboard', compact(
            'templates',
            'totalAnak',
            'totalOrtu',
            'labels',
            'data',
            'pengukuran',
            'totalKecamatan'
        ));
     }
    }

    public function filter(Request $request)
    {
        if (Auth::guard('web')->check()) {
        $filter = $request->get('filter');
        $query = TemplateEdukasi::query();

        if ($filter == 'today') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($filter == 'week') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter == 'month') {
            $query->whereMonth('created_at', Carbon::now()->month);
        }

        $templates = $query->get();

        $totalAnak = Anak::count();
        $totalOrtu = Ortu::count();

        $dataStunting = DB::table('pengukuran')
            ->join('anak', 'pengukuran.id_anak', '=', 'anak.id')
            ->join('ortu', 'anak.id_orangtua', '=', 'ortu.id')
            ->join('kecamatan', 'ortu.id_kecamatan', '=', 'kecamatan.id')
            ->select('kecamatan.nama as nama_kecamatan', DB::raw('COUNT(*) as total_stunting'))
            ->whereIn('pengukuran.hasil', ['Stunting', 'Resiko Tinggi Stunting'])
            ->groupBy('kecamatan.nama')
            ->get();

        $labels = $dataStunting->pluck('nama_kecamatan');
        $data = $dataStunting->pluck('total_stunting');

        $pengukuran = DB::table('pengukuran')
            ->join('anak', 'pengukuran.id_anak', '=', 'anak.id')
            ->join('ortu', 'anak.id_orangtua', '=', 'ortu.id')
            ->select(
                'anak.nama as nama_anak',
                'ortu.nama as nama_ortu',
                'pengukuran.usia_bulan',
                'pengukuran.berat',
                'pengukuran.tinggi',
                'pengukuran.status_gizi_bmi',
                'pengukuran.created_at as tanggal_pengukuran'
            )
            ->orderBy('pengukuran.created_at', 'desc')
            ->get();

        return view('dashboard', compact(
            'templates',
            'totalAnak',
            'totalOrtu',
            'labels',
            'data',
            'pengukuran',
            'filter'
        ));
      }
    }

    // ortu
  public function dashboardOrtu()
{
    $idOrtu = Auth::guard('ortu')->id();

    // Ambil semua anak milik ortu yang login
    $listAnak = Anak::where('id_orangtua', $idOrtu)->get();

    // Ambil pengukuran terbaru tiap anak
    $pengukuranTerbaru = collect();
    foreach ($listAnak as $a) {
        $lastPengukuran = Pengukuran::where('id_anak', $a->id)
            ->latest('created_at')
            ->first();
        if ($lastPengukuran) {
            $pengukuranTerbaru->push($lastPengukuran);
        }
    }

    // Hitung status gizi berdasarkan pengukuran terbaru untuk grafik
    $statusGiziCount = $pengukuranTerbaru->groupBy('status_gizi_bmi')
        ->map(function ($group) {
            return $group->count();
        });

    // Mapping status gizi ke angka untuk grafik
    $statusMap = [
        'Kurus' => 1,
        'Normal' => 2,
        'Gemuk' => 3,
    ];

    $namaAnak = [];
    $statusGiziAngka = []; // Ganti nama agar konsisten dengan Blade

    foreach ($pengukuranTerbaru as $pengukuran) {
        if ($pengukuran->anak) {
            $namaAnak[] = $pengukuran->anak->nama;

            // Konversi status gizi ke angka
            $statusGiziAngka[] = $statusMap[$pengukuran->status_gizi_bmi] ?? 0;
        }
    }

    return view('orangtua.dashboardortu', [
        'anak' => $listAnak,
        'pengukuranTerbaru' => $pengukuranTerbaru,
        'statusGiziCount' => $statusGiziCount,
        'namaAnak' => $namaAnak,
        'statusGiziAngka' => $statusGiziAngka, // kirim ke Blade
    ]);
}


    }

