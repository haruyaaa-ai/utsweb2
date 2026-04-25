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
}
