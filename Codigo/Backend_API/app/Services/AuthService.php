<?php
namespace App\Services;

use App\Interfaces\IAuthService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class AuthService implements IAuthService
{
    public function register(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token', ['user'], now()->addMonth())->plainTextToken;

        return $token;
    }

    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'error' => ['The provided credentials are incorrect.'],
            ]);
        }

        $currentToken = $user->createToken('auth_token', [$user->role], now()->addMonth())->plainTextToken;

        return $currentToken;
    }

    public function logout()
    {
        return null;
    }

    private function verifyToken($tokens)
    {
        $lastToken = $tokens
                        ->orderBy('created_at', 'desc')
                        ->first()->id;

        if($lastToken){
            return $lastToken;
        }
        else{
            return null;
        }
    }
}
