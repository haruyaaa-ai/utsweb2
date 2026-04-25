@extends('layouts.app')

@section('content')
<h4>Edit Matakuliah</h4>
<form method="POST" action="{{ route('matakuliah.update', $matakulium) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Nama Matakuliah</label>
    <input name="nama_matakuliah" class="form-control" value="{{ old('nama_matakuliah', $matakulium->nama_matakuliah) }}">
    @error('nama_matakuliah')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">SKS</label>
    <input name="sks" type="number" class="form-control" value="{{ old('sks', $matakulium->sks) }}">
    @error('sks')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Jurusan</label>
    <select name="id_jurusan" class="form-select">
      <option value="">- Pilih -</option>
      @foreach($jurusans as $j)
        <option value="{{ $j->id_jurusan }}" @if(old('id_jurusan', $matakulium->id_jurusan)==$j->id_jurusan) selected @endif>{{ $j->nama_jurusan }}</option>
      @endforeach
    </select>
    @error('id_jurusan')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
