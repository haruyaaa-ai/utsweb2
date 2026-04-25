<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_jurusan' => 'required|string|max:150',
            'akreditasi' => 'nullable|string|max:10'
        ];
    }
}
