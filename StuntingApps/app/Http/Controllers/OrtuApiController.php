<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrtuApiController extends Controller
{
    public function show($id)
    {
        $ortu = Ortu::with('kecamatan')->find($id);

        if (!$ortu) {
            return response()->json([
                'status' => false,
                'message' => 'Data orang tua tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $ortu
        ]);
    }

    public function update(Request $request, $id)
    {
        $ortu = Ortu::find($id);

        if (!$ortu) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'id_kecamatan' => 'required|integer|exists:kecamatan,id',
        ]);

        $ortu->nama = $validated['nama'];
        $ortu->email = $validated['email'];
        $ortu->alamat = $validated['alamat'];
        $ortu->id_kecamatan = $validated['id_kecamatan'];
        $ortu->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $ortu
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $ortu = Ortu::find($id);

        if (!$ortu) {
            return response()->json([
                'status' => false,
                'message' => 'Data orang tua tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6',
        ]);

        if (!Hash::check($validated['old_password'], $ortu->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password lama salah'
            ], 400);
        }

        $ortu->password = Hash::make($validated['new_password']);
        $ortu->save();

        return response()->json([
            'status' => true,
            'message' => 'Password berhasil diperbarui'
        ]);
    }

}
