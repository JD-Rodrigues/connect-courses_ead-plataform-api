<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use AuthUtilsTrait;
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

    public function test_unauthorized_logout_without_authentication(): void
    {
        $response = $this->postJson('/logout', []);

        $response->assertStatus(401);
    }

    public function test_success_logout_with_authentication(): void
    {            
        $response = $this->postJson('/logout', [], $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_unauthorized_get_me_without_authentication(): void
    {
        $response = $this->getJson("/me");

        $response->assertStatus(401);
    }

    public function test_success_get_me_with_authentication(): void
    {        
        $response = $this->getJson('/me', $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_forgot_password_route(): void
    {
        $response = $this->postJson(
            "/forgot-password", 
            ["email" => "algumemail@gmail.com"]
        );

        $response->assertStatus(200);
    }
    
}
