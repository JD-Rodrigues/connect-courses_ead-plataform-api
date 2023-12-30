<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use AuthUtilsTrait;
    public function test_get_courses_without_authentication_fails(): void
    {
        $response = $this->getJson('/courses');

        $response->assertStatus(401);
    }
}
