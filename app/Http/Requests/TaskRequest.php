<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => 'required|string|min:2|max:35',
            "description" => 'required|string|min:2|max:500',
            "status" => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            "title.required" => 'Judul harus diisi.',
            "title.string" => 'Judul harus berupa teks.',
            "title.min" => 'Masukkan minimal 2 karakter.',
            "title.max" => 'Masukkan maksimal 35 karakter.',
            "description.required" => 'Deskripsi harus diisi.',
            "description.string" => 'Deskripsi harus berupa teks.',
            "description.min" => 'Masukkan minimal 2 karakter.',
            "description.max" => 'Masukkan maksimal 35 karakter.',
            "status.required" => 'Status harus diisi.',
            "status.string" => 'Status harus berupa teks.',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code'      => 422,
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors(),
        ], 422));
    }
}
