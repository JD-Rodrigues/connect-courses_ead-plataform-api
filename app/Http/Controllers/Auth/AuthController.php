<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public static function auth(AuthRequest $request) {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'token'=> $user->createToken($request->password)->plainTextToken
        ]);
    }

    public static function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            'logout'=>'success'
        ]);
    }

    
}
