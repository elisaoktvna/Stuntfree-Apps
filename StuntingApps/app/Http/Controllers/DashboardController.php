<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Edukasi;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use App\Models\TemplateEdukasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;

class DashboardController extends Controller
{
    public function index()
    {
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
            'totalAnak',
            'totalOrtu',
            'labels',
            'data',
            'pengukuran',
            'totalKecamatan'
        ));
    }

    public function filter(Request $request)
    {
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
