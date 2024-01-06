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
        $response->assertJson(['logout'=>'success']);
        
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

    public function test_get_me_content_response_matches(): void
    {        
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $response = $this->getJson('/me');

        $response->assertJson([
            'data'=> [
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email
            ]
        ]);
    }

    public function test_forgot_password_invalid_email_fails(): void
    {
        $response = $this->postJson(
            "/forgot-password", 
            ["email" => "algumemail@gmail.com"]
        );

        $response->assertStatus(422);
        
        $response->assertJson(["Houve um erro" => "passwords.user"]);
    }
    
    public function test_forgot_password_valid_email_succeed(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson(
            "/forgot-password", 
            ["email" => $user->email]
        );

        $response->assertStatus(200)
        
        ->assertJson(["Link de redefinição de senha enviado para o e-mail: " . $user->email . "."]);
    }

    public function test_reset_password_invalid_data_fails(): void
    {
        $response = $this->postJson(
            "/forgot-password", 
            ["email" => "algumemail@gmail.com"]
        );

        $response->assertStatus(422);
        
        $response->assertJson(["Houve um erro" => "passwords.user"]);
    }

   
}
