@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Anak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data Anak</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Anak</h5>
            <p>Berikut merupakan detail dari data Anak</p>
            <a href="/addanak" class="btn btn-success mb-3">Tambah Data Anak</a>
            @if(session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                    @endif

            <!-- Table with stripped rows -->
            {{-- <a href="/addanak" class="btn btn-success mb-3">Tambah Data Anak</a> --}}
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ortu</th>
                  <th>NIK</th>
                  <th>Nama Anak</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Status</th>
                  @auth('web')
                       <th>Aksi</th>
                  @endauth

                </tr>
              </thead>
              <tbody>
                @foreach ($anak as $index => $an)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $an->ortu->nama }}</td>
                    <td>{{ $an->nik}}</td>
                    <td>{{ $an->nama }}</td>
                    <td>{{ $an->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $an->tanggal_lahir }}</td>
                    <td>

                        @if ($an->status === 'diterima')
                            <span class="badge bg-success">{{ $an->status }}</span>
                        @elseif ($an->status === 'ditolak')
                            <span class="badge bg-danger">{{ $an->status }}</span>
                        @elseif ($an->status === 'proses')
                            <span class="badge bg-warning">{{ $an->status }}</span>
                        @else
                            <span>{{ $an->status }}</span>
                        @endif
                    </td>
                    <td>
                        @auth('web')
                        @if ($an->status === 'proses')
                            <form action="{{ route('anak.verifikasi', [$an->id, 'diterima']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menyetujui data ini?')">
                                    <i class="bx bx-check-circle"></i>
                                </button>
                             </form>

                             <form action="{{ route('anak.verifikasi', [$an->id, 'ditolak']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin menolak data ini?')">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                             </form>
                        @endif

                        {{-- detail --}}
                        <a href="{{ route('anak.show', $an->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>


                        <form action="{{ route('anak.destroy', $an->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="bx bxs-trash"></i>
                          </button>
                        </form>
                        @endauth
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>



          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
