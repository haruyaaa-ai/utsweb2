<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatakuliahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_matakuliah' => 'required|string|max:200',
            'sks' => 'required|integer|min:1|max:10',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan'
        ];
    }
}
