@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Ortu</h5>
            <p>Berikut merupakan detail dari data admin </p>
            @if(session('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
            @endif
            <!-- Table with stripped rows -->
            <a href="/addortu" class="btn btn-success mb-3">Tambah Data Ortu</a>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Kecamatan</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ortu as $p )
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $p->nama}}</td>
                    <td>{{ $p->email}}</td>
                    <td>{{ $p->kecamatan->nama}}</td>
                    <td>{{ $p->alamat}}</td>
                    <td>
                      <a href="/editortu/{{ $p->id }}" class="btn btn-primary">Edit</a>
                      <a href="#" class="btn btn-danger">Hapus</a>
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
