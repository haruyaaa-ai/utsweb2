@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
  <h4>Matakuliah</h4>
  <div><a href="{{ route('matakuliah.create') }}" class="btn btn-sm btn-primary">Tambah</a></div>
</div>

<form class="row g-2 mb-3">
  <div class="col-md-4"><input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Cari matakuliah"></div>
  <div class="col-md-2"><button class="btn btn-secondary">Search</button></div>
</form>

<table class="table table-striped">
  <thead><tr><th>#</th><th>Nama</th><th>SKS</th><th>Jurusan</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($matakuliahs as $m)
    <tr>
      <td>{{ $m->id_matakuliah }}</td>
      <td>{{ $m->nama_matakuliah }}</td>
      <td>{{ $m->sks }}</td>
      <td>{{ $m->jurusan->nama_jurusan ?? '-' }}</td>
      <td>
        <a href="{{ route('matakuliah.edit', $m) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('matakuliah.destroy', $m) }}" method="POST" style="display:inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>

{{ $matakuliahs->links() }}

@endsection
