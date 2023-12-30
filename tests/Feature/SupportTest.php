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

    public function test_get_supports_with_authentication_succeed(): void
    {
        $response = $this->getJson('/supports', $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_post_supports_without_authentication_fails(): void
    {
        $lesson = Lesson::factory()->create();

        $supportData = [
            "status_code" => "T",
            "lesson_id" => $lesson->id,
            "description" => "Help-me! I am stucked!"
        ];

        $response = $this->postJson('/supports', $supportData, []);

        $response->assertStatus(401);
    }

    
}
