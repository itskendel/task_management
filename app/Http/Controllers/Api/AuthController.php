<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $token_result = $user->createToken('Personal Access Token');

        return response()->json([
            'message' => 'User successfully registered',
            'access_token' => $token_result->plainTextToken,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized: Invalid credentials provided.'
            ], 401);
        }

        $user = $request->user();
        $token_result = $user->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $token_result->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => $token_result->accessToken->expires_at
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out and token revoked.'
        ], 200);
    }
}
