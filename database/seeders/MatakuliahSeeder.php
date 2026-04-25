<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        $jurusans = DB::table('jurusans')->pluck('id_jurusan');
        foreach ($jurusans as $id) {
            DB::table('matakuliah')->insert([
                ['nama_matakuliah' => 'Pemrograman Dasar', 'sks'=>3, 'id_jurusan'=>$id, 'created_at'=>now(),'updated_at'=>now()],
                ['nama_matakuliah' => 'Algoritma & Struktur Data', 'sks'=>4, 'id_jurusan'=>$id, 'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
    }
}
