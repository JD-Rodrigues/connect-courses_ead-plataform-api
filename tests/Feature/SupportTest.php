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
        $support = Support::factory(Support::class)->create();
        
        $response = $this->getJson('/supports', $this->createAuthHeader());
    
        $response->assertStatus(200);
        $response->assertJson([
            "data"=>[
                [
                    "id"=> $support->id,
                    "user_id" => $support->user_id,
                    "lesson_id" => $support->lesson_id,
                    "status_code" => $support->status_code,
                    "status" => $support->statusOptions[$support->status_code],
                    "description" => $support->description
                ]
            ]
                ]);
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

    public function test_post_supports_with_authentication_succeed(): void
    {
        $lesson = Lesson::factory()->create();

        $supportData = [
            "status_code" => "T",
            "lesson_id" => $lesson->id,
            "description" => "Help-me! I am stucked!"
        ];

        $response = $this->postJson('/supports', $supportData, $this->createAuthHeader());

        $response->assertStatus(201);
        $response->assertJson($supportData);
    }

    public function test_post_supports_with_invalid_data_fails(): void
    {        
        $response = $this->postJson('/supports', [], $this->createAuthHeader());

        $response->assertStatus(422);
    }

    public function test_get_my_supports_without_authentication_fails(): void
    {
        $response = $this->getJson('/my-supports');

        $response->assertStatus(401);
    }

    public function test_get_my_supports_with_authentication_succeed(): void
    {
        $response = $this->getJson('/my-supports', $this->createAuthHeader());

        $response->assertStatus(200);
    }

    public function test_post_support_repply_without_authentication_fails(): void
    {
        $support = Support::factory()->create();

        $supportData = [
            "support_id" => $support->id,
            "description" => "This is a answer to support!"
        ];

        $response = $this->postJson('/support-replies', $supportData, []);

        $response->assertStatus(401);
    }

    public function test_post_support_repply_with_authentication_succeed(): void
    {
        $support = Support::factory()->create();

        $supportData = [
            "support_id" => $support->id,
            "description" => "This is a answer to support!"
        ];

        $response = $this->postJson('/support-replies', $supportData, $this->createAuthHeader());

        $response->assertStatus(201);
    }

    public function test_post_support_repply_with_invalid_data_fails(): void
    {        
        $response = $this->postJson('/support-replies', [], $this->createAuthHeader());

        $response->assertStatus(422);
    }
}
