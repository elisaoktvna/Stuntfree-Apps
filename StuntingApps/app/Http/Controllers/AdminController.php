<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $admin = User::all();
        return view('pengguna.pengguna', compact('admin'));
    }

    public function create() {
        return view('pengguna.addpengguna');
    }

    public function store (Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $ortu = new User;
        $ortu->name = $request->name;
        $ortu->email = $request->email;
        $ortu->password = Hash::make($request->password);
        $ortu->role = 'admin';
        $ortu->save();

        return redirect('/admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $faskes = User::findOrFail($id);

        $faskes->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus.');
    }

    public function loginForm() {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'Login berhasil sebagai admin');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akses ditolak. Anda bukan admin.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
   }

   public function logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout');
   }

}
