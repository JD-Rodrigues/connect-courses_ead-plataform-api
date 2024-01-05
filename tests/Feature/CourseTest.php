<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use AuthUtilsTrait, RefreshDatabase;
    public function test_get_courses_without_authentication_fails(): void
    {
        $response = $this->getJson('/courses');

        $response->assertStatus(401);
    }

    public function test_get_courses_with_authentication_succeed(): void
    {
        $courses = Course::factory(2)->create();   
        $coursesArray = $courses->all();     

        $response = $this->getJson('/courses', $this->createAuthHeader());
        
        $response->assertStatus(200);
        $this->assertCount(2,$response->json()['data']);
        $response->assertJson(
            [
                "data"=>[
                    [
                        "id"=>$coursesArray[0]['id'],
                        "name"=>$coursesArray[0]['name'],
                        "description"=>$coursesArray[0]['description'],
                        "image"=>$coursesArray[0]['image']
                    ],
                    [
                        "id"=>$coursesArray[1]['id'],
                        "name"=>$coursesArray[1]['name'],
                        "description"=>$coursesArray[1]['description'],
                        "image"=>$coursesArray[1]['image']
                    ]
                ]
            ]
                );
    }   

    public function test_get_a_course_without_authentication_fails(): void
    {
        $course = Course::factory()->create();

        $response = $this->getJson("/courses/{$course->id}", []);

        $response->assertStatus(401);
    }

    public function test_get_a_course_with_authentication_succeed(): void
    {
        $course = Course::factory()->create();

        $response = $this->getJson("/courses/{$course->id}", $this->createAuthHeader());

        $response->assertStatus(200);
        
                    
    }   
}
