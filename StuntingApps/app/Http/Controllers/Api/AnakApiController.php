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

        // cej 
        return response()->json($anak, 200);
    }

    // Menyimpan data anak baru
    public function store(Request $request): JsonResponse
{
    $validated = $request->validate([
        'nik' => 'required|unique:anak',
        'nama' => 'required|max:100',
        'jenis_kelamin' => 'required|in:0,1', // sesuai kiriman dari Flutter
        'tanggal_lahir' => 'required|date',
        'id_orangtua' => 'required|exists:ortu,id',
        'status' => 'nullable|string', // tambahan kalau mau terima status
    ]);

    $anak = new Anak();
    $anak->nik = $validated['nik'];
    $anak->nama = $validated['nama'];
    $anak->jenis_kelamin = $validated['jenis_kelamin']; // akan disimpan 0 atau 1
    $anak->tanggal_lahir = $validated['tanggal_lahir'];
    $anak->id_orangtua = $validated['id_orangtua'];
    $anak->status = $validated['status'] ?? 'proses'; // default proses jika tidak dikirim

    $anak->save();

    return response()->json(['message' => 'Data anak berhasil ditambahkan', 'data' => $anak], 201);
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
                'jenis_kelamin' => 'required|in:0,1',  // sesuai kiriman dari Flutter
                'tanggal_lahir' => 'required|date',
                'id_orangtua' => 'required|exists:ortu,id',  // pastikan sesuai tabel ortu
                'status' => 'nullable|string',
            ]);

            $anak->nik = $validated['nik'];
            $anak->nama = $validated['nama'];
            $anak->jenis_kelamin = $validated['jenis_kelamin'];
            $anak->tanggal_lahir = $validated['tanggal_lahir'];
            $anak->id_orangtua = $validated['id_orangtua'];
            if (isset($validated['status'])) {
                $anak->status = $validated['status'];
            }

            $anak->save();

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
