<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterProject extends FormRequest
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
            'title' => ['required', 'string'],
            'time_id' => ['required', 'string'],
            'description' => ['required', 'string'],
            'honorarios' => ['required', 'integer'],
            'image' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El nombre del proyecto es obligatorio',
            'time_id.required' => 'El tiempo de duración es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'honorarios.required' => 'El honorario es obligatorio',
        ];
    }
}