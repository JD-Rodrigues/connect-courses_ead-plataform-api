<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use AuthUtilsTrait;

    public function test_get_a_lesson_without_authentication_fails(): void
    {
        $lesson = Lesson::factory()->create();

        $response = $this->getJson("/lessons/{$lesson->id}");

        $response->assertStatus(401);
    }

    public function test_get_a_lesson_with_authentication_succeed(): void
    {
        $module = Module::factory()->create();
        $lesson = Lesson::factory()->create(['module_id'=> $module->id]);
        Lesson::factory(3)->create();

        $response = $this->getJson("/lessons/{$lesson->id}", $this->createAuthHeader());

        $response->assertStatus(200);
        $response->assertJson(
            [
                "data"=>[                    
                    "id"=> $lesson->id,
                    "module_id"=> $module->id,
                    "name"=> $lesson->name,
                    "description"=> $lesson->description,
                    "video"=> $lesson->video,
                    "url"=> $lesson->url                    
                ]
            ]
        );
    }
    
}
