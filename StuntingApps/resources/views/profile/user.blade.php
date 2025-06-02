@extends('layout.app')

@section('content')
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div>

<section class="section profile">
  <div class="row justify-content-center">
    <div class="col-xl-6">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle mb-3" style="width: 120px; height: 120px;">
          <h4>{{ $user->name }}</h4>
          <h5>{{ $user->email }}</h5>

          <hr class="my-4 w-75">

          <div class="row w-100 px-4">
            <div class="col-4 fw-bold">Full Name</div>
            <div class="col-8">{{ $user->name }}</div>
          </div>

          <div class="row w-100 px-4 mt-2">
            <div class="col-4 fw-bold">Email</div>
            <div class="col-8">{{ $user->email }}</div>
          </div>

          {{-- Tambahkan field lain jika ada, contoh: --}}
          {{--
          <div class="row w-100 px-4 mt-2">
            <div class="col-4 fw-bold">Phone</div>
            <div class="col-8">{{ $user->phone ?? '-' }}</div>
          </div>
          --}}

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
