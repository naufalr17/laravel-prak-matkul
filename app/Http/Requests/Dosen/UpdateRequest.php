<?php

namespace App\Http\Requests\Dosen;

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
            'nama' => 'required|string|min:3|max:250',
            'mata_kuliah' => 'required|string|min:3|max:6000',
            'dosen_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
