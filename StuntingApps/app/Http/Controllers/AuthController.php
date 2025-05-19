<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Ortu::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        $token = $user->createToken('ortu-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ]);

    }

    public function register(Request $request) {
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:ortu,email',
        'password' => 'required|min:8',
        'id_kecamatan' => 'required|exists:kecamatan,id',
        'alamat' => 'required',
    ]);

    $ortu = Ortu::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'id_kecamatan' => $request->id_kecamatan,
        'alamat' => $request->alamat,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Register berhasil',
        'data' => $ortu
    ]);
   }
}
