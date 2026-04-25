<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Jurusan;
use App\Http\Requests\MatakuliahRequest;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $matakuliahs = Matakuliah::with('jurusan')
            ->when($q, fn($s) => $s->where('nama_matakuliah', 'like', "%{$q}%"))
            ->orderBy('id_matakuliah','desc')
            ->paginate(10)->withQueryString();

        return view('matakuliah.index', compact('matakuliahs', 'q'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('matakuliah.create', compact('jurusans'));
    }

    public function store(MatakuliahRequest $request)
    {
        Matakuliah::create($request->validated());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah dibuat');
    }

    public function edit(Matakuliah $matakulium)
    {
        $jurusans = Jurusan::all();
        return view('matakuliah.edit', ['matakulium' => $matakulium, 'jurusans' => $jurusans]);
    }

    public function update(MatakuliahRequest $request, Matakuliah $matakulium)
    {
        $matakulium->update($request->validated());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah diperbarui');
    }

    public function destroy(Matakuliah $matakulium)
    {
        $matakulium->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah dihapus');
    }
}
