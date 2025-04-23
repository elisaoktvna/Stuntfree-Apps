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
            <h5 class="card-title">Data Edukasi</h5>
            <p>Berikut merupakan detail dari data Edukasi</p>

            <!-- Table with stripped rows -->
            <a href="/addpengguna" class="btn btn-success mb-3">Tambah Data Edukasi</a>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    {{-- disini diawali foreach ya teman" --}}
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="#" class="btn btn-primary">Edit</a>
                      <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
