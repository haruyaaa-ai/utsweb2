<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jurusans as $jurusan)
        <tr>
            <td>{{ $jurusan->id_jurusan }}</td>
            <td>{{ $jurusan->nama_jurusan }}</td>
            <td>{{ $jurusan->akreditasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
