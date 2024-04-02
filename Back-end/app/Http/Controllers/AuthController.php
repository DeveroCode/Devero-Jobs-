<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function logout(Request $request)
    {
        $data = $request->validated();
    }
    public function register(RegisterRequest $request)
    {}
    public function login(Request $request)
    {}
}
