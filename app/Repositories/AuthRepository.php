<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Models\Traits\GetAuthUserTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository
{
    use GetAuthUserTrait;

    private $entity;

    public function __construct(User $model) {
        $this->entity = $model;
    }

    public function getAuthUser(array $filters) {
        
    }

    public function authenticate(array $credentials) {
        try {
            
            $user = $this->entity->where('email', $credentials['email'])->first();
        
            if(!$user || !Hash::check($credentials['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $user->tokens()->delete();

            return response()->json([
                'token'=> $user->createToken($credentials['password'])->plainTextToken
            ]);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            'logout'=>'success'
        ]);
    }
}