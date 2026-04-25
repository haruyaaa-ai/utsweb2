<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('mahasiswa')?->id_mahasiswa ?? null;
        return [
            'nim' => 'required|string|max:50|unique:mahasiswas,nim,' . $id . ',id_mahasiswa',
            'nama' => 'required|string|max:200',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan'
        ];
    }
}
