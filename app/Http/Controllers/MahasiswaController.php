<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $mahasiswas = Mahasiswa::with('jurusan')
            ->when($q, fn($s) => $s->where('nama', 'like', "%{$q}%")->orWhere('nim', 'like', "%{$q}%"))
            ->orderBy('id_mahasiswa','desc')
            ->paginate(10)->withQueryString();

        return view('mahasiswa.index', compact('mahasiswas', 'q'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(MahasiswaRequest $request)
    {
        Mahasiswa::create($request->validated());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa dibuat');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa diperbarui');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa dihapus');
    }

    // PRINT CSV
    public function exportCsv()
    {
        $fileName = 'mahasiswas.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($headers) {
            $file = fopen('php://output', 'w');

            fwrite($file, "\xEF\xBB\xBF");
            fputcsv($file, ['ID', 'NIM', 'Nama', 'Jurusan'], ';');

            $mahasiswas = Mahasiswa::with('jurusan')->get();

            foreach ($mahasiswas as $mahasiswa) {
                fputcsv($file, [
                    $mahasiswa->id_mahasiswa,
                    $mahasiswa->nim,
                    $mahasiswa->nama,
                    $mahasiswa->jurusan->nama_jurusan ?? '-',
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // PRINT PDF
    public function print()
    {
        $mahasiswas = Mahasiswa::with('jurusan')->get();
        
        return view('mahasiswa.print', compact('mahasiswas'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $mahasiswas = Mahasiswa::with('jurusan')->get();

        return response()
            ->view('mahasiswa.excel', compact('mahasiswas'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="mahasiswas.xls"');
    }

}
