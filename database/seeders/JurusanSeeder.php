<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('jurusans')->insert([
            ['nama_jurusan' => 'Teknik Informatika', 'akreditasi' => 'A', 'created_at'=>now(),'updated_at'=>now()],
            ['nama_jurusan' => 'Sistem Informasi', 'akreditasi' => 'B', 'created_at'=>now(),'updated_at'=>now()],
            ['nama_jurusan' => 'Teknik Elektro', 'akreditasi' => 'B', 'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
