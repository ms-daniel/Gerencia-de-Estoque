<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->authService->register($request->all());


        $cookie = cookie('auth_token', $user, 60*24, null, null, false, true, false, 'none');

        Auth::login($user);

        return response()->json([
            'status' => true,
            'message' => 'Registered and logged in successfully!',
        ], 200)
        ->withCookie($cookie);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        $cookie = cookie('auth_token', $token, 60*24, null, null, true, true, false, 'none');

        return response()->json([
            'status' => true,
            'message' => 'Login successfully!'
        ], 200)
        ->withCookie($cookie);
    }


    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();

        $cookie = cookie()->forget('auth_token');

        return response()->json(['message' => 'Logout successful'])->cookie($cookie);
    }
}
