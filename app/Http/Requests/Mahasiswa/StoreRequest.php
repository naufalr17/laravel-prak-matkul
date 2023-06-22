<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nim' => 'required|string|min:3|max:250',
            'nama' => 'required|string|min:3|max:250',
            'umur' => 'required|string|min:3|max:250',
            'alamat' => 'required|string|min:3|max:250',
            'kota' => 'required|string|min:3|max:250',
            'kelas' => 'required|string|min:3|max:250',
            'jurusan' => 'required|string|min:3|max:250'

        ];
    }
}
