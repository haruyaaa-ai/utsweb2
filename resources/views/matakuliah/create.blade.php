@extends('layouts.app')

@section('content')
<h4>Tambah Matakuliah</h4>
<form method="POST" action="{{ route('matakuliah.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nama Matakuliah</label>
    <input name="nama_matakuliah" class="form-control" value="{{ old('nama_matakuliah') }}">
    @error('nama_matakuliah')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">SKS</label>
    <input name="sks" type="number" class="form-control" value="{{ old('sks', 3) }}">
    @error('sks')<div class="text-danger small">{{ $message }}</div>@enderror
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
