<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            // datos a validar para actualizar el perfil
            'name' => ['nullable', 'string', 'max:255'],
            'apellidos' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
        ];

        if ($this->filled('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            //
            'name' => 'El nombre es requerido',
            'email.email' => 'El email no es correcto',
            'email.unique' => 'La cuenta ya existe por favor registre un nuevo email, o reinicie su contraseña',
            'password.required' => 'La contraseña es obligatoria para guardar los cambios',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }
}
