@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Data Tempat Paket Gizi</h1>
    <nav></nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tempat Paket Gizi</h5>
          <p>Berikut merupakan detail dari data Tempat Paket Gizi</p>

          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <a href="{{ route('paketgizi.create') }}" class="btn btn-success mb-3">Tambah Data</a>

          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th> 
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>URL Maps</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paketgizi as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->telepon }}</td>
                <td>
                  <a href="{{ $item->urlmaps }}" target="_blank" class="btn btn-info btn-sm">Lihat di Maps</a>
                </td>
                <td>
                  <a href="{{ route('paketgizi.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit"></i>
                  </a>
                  <form action="{{ route('paketgizi.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="bx bxs-trash"></i>
                    </button>
                  </form>
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
