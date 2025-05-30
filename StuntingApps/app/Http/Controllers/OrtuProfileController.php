<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrtuProfileController extends Controller
{
    public function index() {
    $ortu = Auth::guard('ortu')->user();
    return view('profile.ortu', compact('ortu'));
}

}
