<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class ModuleTest extends TestCase
{
    use AuthUtilsTrait;

    public function test_get_a_module_without_authentication_fails(): void
    {
        $course = Course::factory()->create();
        $module = Module::factory()->create([
            'course_id' => $course->id
        ]);

        $response = $this->getJson("/courses/{$course->id}/modules");

        $response->assertStatus(401);
    }   
    public function test_get_a_module_with_authentication_succeed(): void
    {
        $course = Course::factory()->create();
        $module = Module::factory()->create([
            'course_id' => $course->id
        ]);

        $response = $this->getJson("/courses/{$course->id}/modules", $this->createAuthHeader());

        $response->assertStatus(200);
        $response->assertJson(
            [
                "data"=>[
                    [
                        "id"=> $module->id,
                        "name"=> $module->name,
                        "course_id"=> $course->id,
                    ]
                ]
            ]
            );
        }   
}
