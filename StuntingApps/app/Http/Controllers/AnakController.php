<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index() 
    {
        $anak = Anak::all();
        return view('anak.anak', compact('anak'));
    }

    public function create()
    {
        return view('anak.addanak');
    }

    // validasi input
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

    // simpan data ke database
    $anak = new Anak();
    $anak->nama = $request->nama;
    $anak->jenis_kelamin = $request->jenis_kelamin;
    $anak->umur = $request->umur;
    $anak->tanggal_lahir = $request->tanggal_lahir;
    $anak->alamat = $request->alamat;
    $anak->id_user = 1;
    //$anak->id_user = auth()->user()->id;
    $anak->save();

    // redirect pesan sukses
    return redirect('/anak')->with('success', 'Data anak berhasil ditambahkan');
    }

    public function edit(Anak $anak)
   {
     return view('anak.editanak', compact('anak'));
   }

   public function update(Request $request, Anak $anak)
   {
    $request->validate([
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'umur' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
    ]);

    $anak->nama = $request->nama;
    $anak->jenis_kelamin = $request->jenis_kelamin;
    $anak->umur = $request->umur;
    $anak->tanggal_lahir = $request->tanggal_lahir;
    $anak->alamat = $request->alamat;
    $anak->save();
    
    return redirect()->route('anak.index')->with('success', 'Data anak berhasil diperbarui');
   }

   public function destroy(Anak $anak)
   {
     $anak->delete();
     return redirect()->route('anak.index')->with('success', 'Data anak berhasil dihapus');
   }
}
