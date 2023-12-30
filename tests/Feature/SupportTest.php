<?php

namespace Tests\Feature;

use App\Models\Lesson;
use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class SupportTest extends TestCase
{
    use AuthUtilsTrait;
    public function test_get_supports_without_authentication_fails(): void
    {
        $response = $this->getJson('/supports');

        $response->assertStatus(401);
    }

    
}
