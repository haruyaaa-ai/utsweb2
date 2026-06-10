@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
  <h4>Jurusan</h4>
  <div>
    <a href="{{ route('jurusan.create') }}" class="btn btn-sm btn-primary">Tambah</a>
    <a href="{{ route('jurusan.exportExcel') }}" class="btn btn-sm btn-success">Export Excel</a>
    <a href="{{ route('jurusan.exportPdf') }}" class="btn btn-sm btn-danger">Export PDF</a>
  </div>
</div>

<form class="row g-2 mb-3">
  <div class="col-md-4"><input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Cari"></div>
  <div class="col-md-2"><button class="btn btn-secondary">Search</button></div>
</form>

<table class="table table-striped">
  <thead><tr><th>#</th><th>Nama</th><th>Akreditasi</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($jurusans as $j)
    <tr>
      <td>{{ $j->id_jurusan }}</td>
      <td>{{ $j->nama_jurusan }}</td>
      <td>{{ $j->akreditasi }}</td>
      <td>
        <a href="{{ route('jurusan.edit', $j) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('jurusan.destroy', $j) }}" method="POST" style="display:inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>

{{ $jurusans->links() }}

@endsection
