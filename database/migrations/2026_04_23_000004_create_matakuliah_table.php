<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->bigIncrements('id_matakuliah');
            $table->string('nama_matakuliah');
            $table->unsignedTinyInteger('sks')->default(3);
            $table->unsignedBigInteger('id_jurusan');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
};
