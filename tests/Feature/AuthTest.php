<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_unauthorized_login_no_credentials(): void
    {
        $response = $this->postJson('/login', []);

        $response->assertStatus(422);
    }

    public function test_authorized_login(): void
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
}
