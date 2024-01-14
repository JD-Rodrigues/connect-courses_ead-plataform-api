<?php

namespace Tests\Feature;

use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use AuthUtilsTrait;
    public function test_mark_view_without_authentication_fails(): void
    {
        $response = $this->post('/views',[],['Accept'=>'Application/json']);

        $response->assertStatus(401);
    }

    
}
