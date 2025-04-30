<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakController extends Controller
{
    public function index()
    {
        $anak = Anak::with('user')->get();
        return view('anak.anak', compact('anak'));
    }

    public function create()
    {
        $ortu = User::where('role', 'orang tua')->get();
        return view('anak.addanak', compact('ortu'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'nik' => 'required',
        'nama' => 'required|max:100',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'umur' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'id_user' => 'required',
    ]);

    // if (Auth::user()->role == 'admin') {
    //     // Admin bisa pilih id_user
    //     $validated['id_user'] = $request->validate([
    //         'id_user' => 'required|exists:users,id',
    //     ])['id_user'];
    // } else {
    //     // Ortu otomatis pakai id yang login
    //     $validated['id_user'] = Auth::id();
    // }

    Anak::create($validated);

    return redirect('/anak')->with('success', 'Data anak berhasil ditambahkan');
    }


    public function edit(Anak $anak)
   {
     return view('anak.editanak', compact('anak'));
   }

   public function update(Request $request, Anak $anak)
   {
    $request->validate([
        'nik' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'umur' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
    ]);

    $anak->nik = $request->nik;
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
