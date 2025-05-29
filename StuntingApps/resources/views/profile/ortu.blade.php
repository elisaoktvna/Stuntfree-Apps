@extends('layout.app')
@section('content')
<div class="card p-4">
  <h4>Profil Orang Tua</h4>
  <p>Nama : {{ $ortu->nama }}</p>
  <p>Email: {{ $ortu->email }}</p>
  <p>Alamat : {{ $ortu->alamat }}</p>
</div>
@endsection
