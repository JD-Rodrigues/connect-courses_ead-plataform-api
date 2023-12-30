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
    public function test_login_with_invalid_credentials_fails(): void
    {
        $response = $this->postJson('/login', []);

        $response->assertStatus(422);
    }

    public function test_login_with_valid_credentials_succeed(): void
    {
        $user = User::factory()->create();
        
        $response = $this->postJson('/login',
        [
            'email' => $user->email,
            'password' => 'password',
        ]);
        // dd($user->email);
        $response->assertJsonStructure(['token']);
        $response->assertStatus(200);       
        
    }

    public function test_logout_without_authentication_fails(): void
    {
        $response = $this->postJson('/logout', []);

        $response->assertStatus(401);
    }

    public function test_logout_with_authentication_succeed(): void
    {            
        $response = $this->postJson('/logout', [], $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_get_me_without_authentication_fails(): void
    {
        $response = $this->getJson("/me");

        $response->assertStatus(401);
    }

    public function test_get_me_with_authentication_succeed(): void
    {        
        $response = $this->getJson('/me', $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_forgot_password_route_works(): void
    {
        $response = $this->postJson(
            "/forgot-password", 
            ["email" => "algumemail@gmail.com"]
        );

        $response->assertStatus(200);
    }
    
}
