<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $jurusans = DB::table('jurusans')->pluck('id_jurusan');
        $i = 1;
        foreach ($jurusans as $id) {
            for ($k=0;$k<5;$k++) {
                DB::table('mahasiswas')->insert([
                    'nim' => '2026' . str_pad($i++, 4, '0', STR_PAD_LEFT),
                    'nama' => 'Mahasiswa ' . $i,
                    'id_jurusan' => $id,
                    'created_at'=>now(),'updated_at'=>now()
                ]);
            }
        }
    }
}
