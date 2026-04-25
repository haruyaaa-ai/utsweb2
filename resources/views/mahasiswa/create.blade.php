@extends('layouts.app')

@section('content')
<h4>Tambah Mahasiswa</h4>
<form method="POST" action="{{ route('mahasiswa.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input name="nim" class="form-control" value="{{ old('nim') }}">
    @error('nim')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input name="nama" class="form-control" value="{{ old('nama') }}">
    @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Jurusan</label>
    <select name="id_jurusan" class="form-select">
      <option value="">- Pilih -</option>
      @foreach($jurusans as $j)
        <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
      @endforeach
    </select>
    @error('id_jurusan')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <button class="btn btn-primary">Simpan</button>
</form>
@endsection
