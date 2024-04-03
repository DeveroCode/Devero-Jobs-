<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'apellidos' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                Password::min(8)->letters()->symbols()->numbers(),
            ],
            'type_user' => ['required', 'integer'],

        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es requerido',
            'apellidos' => 'Incluya un apellido ó ambos',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es correcto',
            'email.unique' => 'El email ya existe',
            'password.required' => 'La contraseña es obligatoria',
            'type_user' => 'El tipo de usario es necesario',
        ];
    }
}
