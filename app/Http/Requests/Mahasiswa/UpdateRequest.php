<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'nim' => 'nullable|string|min:3|max:250',
            'nama' => 'nullable|string|min:3|max:250',
            'umur' => 'nullable|string|min:3|max:250',
            'alamat' => 'nullable|string|min:3|max:250',
            'kota' => 'nullable|string|min:3|max:250',
            'kelas' => 'nullable|string|min:3|max:250',
            'jurusan' => 'nullable|string|min:3|max:250'
        ];
    }
}
