<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $pengguna = User::all();
        return view('pengguna.pengguna', compact('pengguna'));
    }

    public function create() {
        return view('pengguna.addpengguna');
    }
}
