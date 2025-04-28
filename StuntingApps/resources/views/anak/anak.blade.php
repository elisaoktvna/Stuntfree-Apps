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

            @if(session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                    @endif  

            <!-- Table with stripped rows -->
            <a href="/addanak" class="btn btn-success mb-3">Tambah Data Anak</a>

            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($anak as $index => $an)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $an->nama }}</td>
                    <td>{{ $an->jenis_kelamin }}</td>
                    <td>{{ $an->umur }}</td>
                    <td>{{ $an->tanggal_lahir }}</td>
                    <td>{{ $an->alamat }}</td>
                    <td>
                      <a href="{{ route('anak.edit', $an->id) }}" class="btn btn-primary">
                        <i class="bx bx-edit"></i>
                      </a>
                        <form action="{{ route('anak.destroy', $an->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
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
