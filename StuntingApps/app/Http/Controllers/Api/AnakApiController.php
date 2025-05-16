<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AnakApiController extends Controller
{
    public function __construct(
        private Anak $anak
    )
    {}

    // Menampilkan semua data anak
    public function index()
    {
        $anak = Anak::with('ortu')->get();
        return response()->json($anak, 200);
    }

    // Menyimpan data anak baru
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nik' => 'required|unique:anak',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'id_orangtua' => 'required|exists:ortu,id',
            // Hapus validasi id_orangtua dari request
        ]);

        // Ambil id user yang login
        // $ortu = Auth::guard('ortu')->ortu();
        // $validated['id_orangtua'] = $ortu->id;
        

        // $anak = Anak::create($validated);

        $anak = $this->anak;

        $anak->nik = $request->nik;
        $anak->nama = $request->nama;
        $anak->jenis_kelamin = $request->jenis_kelamin;
        $anak->tanggal_lahir = $request->tanggal_lahir;
        $anak->id_orangtua = $request->id_orangtua;

        $anak->save();

        return response()->json(['message' => 'Data anak berhasil ditambahkan', 'data' => $anak], 200);
    }


    // Menampilkan data anak berdasarkan ID
    public function show($id)
    {
        $anak = Anak::find($id);
        if (!$anak) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($anak, 200);
    }

    // Memperbarui data anak
    public function update(Request $request, $id)
    {
        $anak = Anak::find($id);
        if (!$anak) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nik' => 'required|unique:anak,nik,' . $anak->id,
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'id_orangtua' => 'required|exists:users,id',
        ]);

        $anak->update($validated);

        return response()->json(['message' => 'Data anak berhasil diperbarui', 'data' => $anak], 200);
    }

    // Menghapus data anak
    public function destroy($id)
    {
        $anak = Anak::find($id);
        if (!$anak) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $anak->delete();
        return response()->json(['message' => 'Data anak berhasil dihapus'], 204);
    }
}