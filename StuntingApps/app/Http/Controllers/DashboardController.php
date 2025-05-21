<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Edukasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $edukasis = Edukasi::all();

        $totalAnak = Anak::count();

        $totalOrtu = Ortu::count();

        return view('dashboard', compact('edukasis', 'totalAnak', 'totalOrtu'));
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
