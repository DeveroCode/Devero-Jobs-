<?php

namespace App\Http\Requests;

use App\Rules\ConfirmPassword;
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
            // data validate for update profile
            'name' => ['nullable', 'string', 'max:255'],
            'appellidos' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'password' => ['required', 'string', new ConfirmPassword($this->user())],
        ];

        // Si el campo password no está vacío, agregamos la regla ConfirmPassword
        if (!empty($this->password)) {
            $rules['password'] = ['nullable', 'string', new ConfirmPassword($this->user())];
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
