<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Http\Requests\JurusanRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $jurusans = Jurusan::when($q, fn($s) => $s->where('nama_jurusan', 'like', "%{$q}%"))->orderBy('id_jurusan','desc')->paginate(10)->withQueryString();
        return view('jurusan.index', compact('jurusans', 'q'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(JurusanRequest $request)
    {
        Jurusan::create($request->validated());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan dibuat');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(JurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->update($request->validated());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan diperbarui');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan dihapus');
    }

    public function exportExcel()
    {
        $jurusans = Jurusan::orderBy('id_jurusan', 'desc')->get();

        return response()
            ->view('jurusan.excel', compact('jurusans'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="jurusans.xls"');
    }

    public function exportPdf()
    {
        $jurusans = Jurusan::orderBy('id_jurusan', 'desc')->get();

        $pdf = Pdf::loadView('jurusan.print', compact('jurusans'));

        return $pdf->download('jurusans.pdf');
    }
}
