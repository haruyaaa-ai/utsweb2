@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-3">
      <div class="card-body">
        <h4>Dashboard</h4>
        <p class="mb-0">Ringkasan data singkat</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-white bg-primary mb-3"><div class="card-body"><h5>Jurusan</h5><h2>{{ $jurusan }}</h2></div></div>
  </div>
  <div class="col-md-4">
    <div class="card text-white bg-success mb-3"><div class="card-body"><h5>Mahasiswa</h5><h2>{{ $mahasiswa }}</h2></div></div>
  </div>
  <div class="col-md-4">
    <div class="card text-white bg-warning mb-3"><div class="card-body"><h5>Matakuliah</h5><h2>{{ $matakuliah }}</h2></div></div>
  </div>
</div>

@endsection
