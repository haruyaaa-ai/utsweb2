<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->string('nim')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_jurusan');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
