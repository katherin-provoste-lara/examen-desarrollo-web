<?php

// ✅ Versión JWT correcta
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $token = auth('api')->attempt($credentials); // 👈 usa auth('api')->attempt(), no createToken()

        if (!$token) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function me()
    {
        return response()->json(auth('api')->user(), 200);
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
    }

    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }
}
