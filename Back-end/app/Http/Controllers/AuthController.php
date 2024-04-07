<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function logout(Request $request)
    {
    }
    public function register(RegisterRequest $request)
    {
        // Validate
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type_user_id' => $data['type_user'],
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user,
        ];
    }
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        // Check the password
        // Intentar autenticar al usuario
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();
        // Generar un token de autenticación
        $token = $user->createToken('AuthToken')->plainTextToken;

        // Devolver la respuesta con el token y los datos del usuario
        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        // Verificar si la contraseña proporcionada coincide con la contraseña actual del usuario
        // Verificar si la contraseña actual coincide
        if (!password_verify($data['password'], $user->password)) {
            return response()->json(['error' => 'La contraseña actual es incorrecta'], 401);
        }

        // La contraseña actual coincide, proceder con la actualización del perfil
        unset($data['password']); // Eliminar la contraseña del array de datos

        // Actualizar el perfil del usuario
        $user->update($data);

        return $user;
    }
}
