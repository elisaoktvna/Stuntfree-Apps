@extends('layout.app')

@section('content')
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div>

<section class="section profile">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

      <div class="card shadow-sm">
        <div class="card-body text-center">

          <img src="{{ asset('assets/img/profile-img.jpg') }}"
               alt="Profile Picture"
               class="rounded-circle mb-3"
               style="width: 120px; height: 120px; object-fit: cover;">

          <h4 class="mb-1">{{ $ortu->nama }}</h4>
          <p class="text-muted mb-4">{{ $ortu->email }}</p>

          <div class="text-start px-4">
            <div class="row mb-3">
              <div class="col-4 fw-semibold">Full Name</div>
              <div class="col-8">{{ $ortu->nama }}</div>
            </div>

            <div class="row mb-3">
              <div class="col-4 fw-semibold">Email</div>
              <div class="col-8">{{ $ortu->email }}</div>
            </div>

            {{-- Jika ada field tambahan, aktifkan dan sesuaikan --}}
            {{--
            <div class="row mb-3">
              <div class="col-4 fw-semibold">Phone</div>
              <div class="col-8">{{ $ortu->phone ?? '-' }}</div>
            </div>
            --}}
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
