<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterProjectRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'time_id' => ['required', 'string'],
            'description' => ['required', 'string'],
            'honorarios' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del proyecto es obligatorio',
            'time_id.required' => 'El tiempo de duración es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'honorarios.required' => 'El honorario es obligatorio',
        ];
    }
}
