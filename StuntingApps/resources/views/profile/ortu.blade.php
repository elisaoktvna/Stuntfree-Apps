@extends('layout.app')
@section('content')

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div>

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="{{ asset('storage/image/profile.png') }}" alt="Profile" class="rounded-circle">

          <h2>{{ $ortu->nama }}</h2>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-8">
      <div class="card">
        <div class="card-body pt-3">

          <h5 class="card-title">Profile Details</h5>

          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
              <input type="text" class="form-control" value="{{ $ortu->nama }}" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
              <input type="email" class="form-control" value="{{ $ortu->email }}" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
              <input type="text" class="form-control" value="{{ $ortu->alamat }}" readonly>
            </div>
          </div>

          {{-- Tambahan info jika tersedia --}}
          {{-- <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
              <input type="text" class="form-control" value="{{ $ortu->no_hp }}" readonly>
            </div>
          </div> --}}

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
