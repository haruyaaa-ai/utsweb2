@extends('layouts.app')

@section('content')
<h4>Edit Jurusan</h4>
<form method="POST" action="{{ route('jurusan.update', $jurusan) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Nama Jurusan</label>
    <input name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}">
    @error('nama_jurusan')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Akreditasi</label>
    <input name="akreditasi" class="form-control" value="{{ old('akreditasi', $jurusan->akreditasi) }}">
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
