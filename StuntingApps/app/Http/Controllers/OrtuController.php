<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrtuController extends Controller
{
    public function index() {
        $ortu = Ortu::with('kecamatan')->get();
        return view('orangtua.ortu', compact('ortu'));
    }

    public function create()  {
        $kec = Kecamatan::all();
        return view('orangtua.addortu', compact('kec'));

    }

    public function store (Request $request) {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
        ]);

        $ortu = new Ortu;
        $ortu->nama = $request->nama;
        $ortu->email = $request->email;
        $ortu->password = Hash::make($request->password);
        $ortu->id_kecamatan = $request->id_kecamatan;
        $ortu->alamat = $request->alamat;
        $ortu->save();

        return redirect('/ortu')->with('success', 'Data berhasil ditambahkan');

    }

    public function edit ($id) {
        $ortu = Ortu::findOrFail($id);
        return view('orangtua.editortu', compact('ortu'));
    }
}
