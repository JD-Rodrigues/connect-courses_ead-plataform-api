<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_with_invalid_credentials(): void
    {
        $response = $this->postJson('/login', []);

        $response->assertStatus(422);
    }

    public function test_login_with_valid_credentials(): void
    {
        User::factory()->create([
            'email'=> 'contato@eu.com',
            'password'=> 'minhasenha',
        ]);

        // var_dump($user);
        $response = $this->postJson(
            '/login', 
            [
                'email' => 'contato@eu.com',
                'password' => 'minhasenha',
            ]
        );

        $response->assertJsonStructure(['token']);
        $response->assertStatus(200);       
        
    }

    public function test_logout_without_authentication(): void
    {
        $response = $this->postJson('/logout', []);

        $response->assertStatus(401);
    }

    public function test_logout_with_authentication(): void
    {
        $user = User::factory()->create();

        $token =  $user->createToken('password')->plainTextToken;
        
        $response = $this->postJson('/logout', [], [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200);
    }

    public function test_get_me_route_without_authentication(): void
    {
        $response = $this->getJson("/me");

        $response->assertStatus(401);
    }
}
