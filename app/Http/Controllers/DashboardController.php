<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::count();
        $mahasiswa = Mahasiswa::count();
        $matakuliah = Matakuliah::count();

        return view('dashboard', compact('jurusan', 'mahasiswa', 'matakuliah'));
    }
}
