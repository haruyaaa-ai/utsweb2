<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jurusan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Jurusan</h2>
    <table>
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
</body>
</html>
