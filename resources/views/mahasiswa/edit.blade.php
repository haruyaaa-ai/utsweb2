@extends('layouts.app')

@section('content')
<h4>Edit Mahasiswa</h4>
<form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
    @error('nim')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
    @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Jurusan</label>
    <select name="id_jurusan" class="form-select">
      <option value="">- Pilih -</option>
      @foreach($jurusans as $j)
        <option value="{{ $j->id_jurusan }}" @if(old('id_jurusan', $mahasiswa->id_jurusan)==$j->id_jurusan) selected @endif>{{ $j->nama_jurusan }}</option>
      @endforeach
    </select>
    @error('id_jurusan')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
