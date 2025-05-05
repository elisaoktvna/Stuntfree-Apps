<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index() {
        // $pengguna = User::all();
        // return view('pengguna.pengguna', compact('pengguna'));
    }

    public function create() {
        // return view('pengguna.addpengguna');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        //     'role' => 'required',
        // ]);

        // $admin = new User;
        // $admin->name = $request->name;
        // $admin->email = $request->email;
        // $admin->password = Hash::make($request->password);
        // $admin->role = $request->role;
        // $admin->save();

        // return redirect('/pengguna')->with('success', 'Data berhasil ditambahkan');

    }
}
