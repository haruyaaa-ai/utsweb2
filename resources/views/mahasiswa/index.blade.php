@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
  <h4>Mahasiswa</h4>
  <div><a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-primary">Tambah</a></div>
</div>

<form class="row g-2 mb-3">
  <div class="col-md-4"><input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Cari nama atau NIM"></div>
  <div class="col-md-2"><button class="btn btn-secondary">Search</button></div>
</form>

<table class="table table-striped">
  <thead><tr><th>#</th><th>NIM</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($mahasiswas as $m)
    <tr>
      <td>{{ $m->id_mahasiswa }}</td>
      <td>{{ $m->nim }}</td>
      <td>{{ $m->nama }}</td>
      <td>{{ $m->jurusan->nama_jurusan ?? '-' }}</td>
      <td>
        <a href="{{ route('mahasiswa.edit', $m) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('mahasiswa.destroy', $m) }}" method="POST" style="display:inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>

{{ $mahasiswas->links() }}

@endsection
