<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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

        $rules = [
            'cv' => ['required', 'mimes:pdf', 'max:2048'],
            'job_posting_id' => ['required'],
            'user_id' => ['required'],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'cv.required' => 'El archivo es obligatorio',
            'cv.mimes' => 'El archivo debe ser un PDF',
            'cv.max' => 'El archivo debe tener un tamaño máximo 2MB',
        ];
    }
}
