@extends('layout.app')
@section('content')

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
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
          <h2>{{ $user->name ?? $user->nama }}</h2>
          <p class="text-muted">{{ $user->email }}</p>
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
              <input type="text" class="form-control" value="{{ $user->name ?? $user->nama }}" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
              <input type="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>
          </div>

          {{-- Tambahan data lain --}}
          {{--
          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
              <input type="text" class="form-control" value="{{ $user->phone ?? '-' }}" readonly>
            </div>
          </div>
          --}}

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
