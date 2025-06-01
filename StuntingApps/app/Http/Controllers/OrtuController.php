<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrtuController extends Controller
{
    public function index() {
        $ortu = Ortu::with('kecamatan')->get();
        $ortuid = Auth::id();

        $anak = Anak::where('id_orangtua', $ortuid)->get();

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

    public function loginForm() {
        if(Auth::guard('ortu')->check()) {
            return redirect('/dahsboard');
        }
        return view('login_ortu');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('ortu')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
   }

   public function logout() {
        Auth::guard('ortu')->logout();
        return redirect('/loginortu')->with('success', 'Berhasil logout');
   }

   public function signup () {
      $kec = Kecamatan::all();
      return view('signup', compact('kec'));
   }

   public function prosessignup(Request $request) {
     $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:ortu,email',
            'password' => 'required|min:8|confirmed',
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

        return redirect('/loginortu')->with('success', 'Daftar berhasil');
   }

}
