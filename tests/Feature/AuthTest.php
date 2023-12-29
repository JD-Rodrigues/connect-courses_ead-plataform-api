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
}
