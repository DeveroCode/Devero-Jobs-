<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //

    public function show()
    {
        return new UserCollection(User::all());
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        // $user->tokens()->delete();

        return [
            'user' => null,
        ];
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
        $data = $request->all(); // Obtener todos los datos de la solicitud
        $user = Auth::user();

        Log::info('Datos recibidos para la actualización:', $data);

        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('public/users');
            $name_image = str_replace('public/users/', '', $imagen);
            $data['image'] = $name_image;
        }

        // Verificar si se proporcionó una contraseña en la solicitud
        if (!isset($data['password'])) {
            // Verificar si la contraseña proporcionada coincide con la contraseña actual del usuario
            if (!password_verify($data['password'], $user->password)) {
                return response()->json(['error' => 'La contraseña actual es incorrecta'], 401);
            }
        }

        // Eliminar la contraseña del array de datos
        unset($data['password']);
        // Actualizar el perfil del usuario
        $user->update($data);
        return response()->json(['message' => 'Perfil actualizado correctamente', 'user' => $user]);
        return $user;
    }
}
