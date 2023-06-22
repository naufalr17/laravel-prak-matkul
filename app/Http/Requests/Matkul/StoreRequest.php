<?php

namespace App\Http\Requests\Matkul;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'matakuliah' => 'required|string|min:3|max:250',
            'jadwal' => 'required|string|min:3|max:250',
        ];
    }
}
