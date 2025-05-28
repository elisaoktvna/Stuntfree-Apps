@extends('layout.app')
@section('content')
<div class="card p-4">
  <h4>Profil Admin</h4>
  <p>Nama: {{ $user->name }}</p>
  <p>Email: {{ $user->email }}</p>
</div>
@endsection
