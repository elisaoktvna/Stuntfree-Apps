<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Edukasi;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $filter = $request->query('filter', 'today');

        $query = Pengukuran::query();

        if ($filter === 'today') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($filter === 'month') {
            $query->whereMonth('created_at', Carbon::now()->month);
        } elseif ($filter === 'year') {
            $query->whereYear('created_at', Carbon::now()->year);
        }

        $stuntingCount = (clone $query)->where('hasil', 'Stunting')->count();
        $normalCount = (clone $query)->where('hasil', 'Normal')->count();
        $tallCount = (clone $query)->where('hasil', 'Tall')->count();

        $edukasis = Edukasi::all();

        $totalAnak = Anak::count();

        $totalOrtu = Ortu::count();

        return view('dashboard', compact('edukasis', 'totalAnak', 'totalOrtu', 'stuntingCount', 'normalCount', 'tallCount', 'filter'));
    }

    public function filter(Request $request)
{
    $filter = $request->get('filter');
    $query = Edukasi::query();

    if ($filter == 'today') {
        $query->whereDate('created_at', Carbon::today());
    } elseif ($filter == 'week') {
        $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
    } elseif ($filter == 'month') {
        $query->whereMonth('created_at', Carbon::now()->month);
    }

    $edukasis = $query->get();

    return view('dashboard', compact('edukasis', 'filter'));

    }

}
