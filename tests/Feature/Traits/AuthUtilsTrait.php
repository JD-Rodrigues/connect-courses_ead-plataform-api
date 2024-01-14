<?php

namespace Tests\Feature\Traits;
use App\Models\User;

trait AuthUtilsTrait {
    public function createAuthHeader() {
        $user = User::factory()->create();
        
        $token =  $user->createToken('password')->plainTextToken;

        return [
            'Authorization' => "Bearer {$token}",
            'Accept' => 'Application/json'
        ];
    }
}