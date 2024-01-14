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

    public function test_mark_view_with_authentication_succeed(): void
    {
        $lesson = Lesson::factory()->create();
        $lesson2 = Lesson::factory()->create();
        
        $response = $this->post(
            '/views',
            [
                'lesson_id' => $lesson->id
            ],
            $this->createAuthHeader());

        $this->post(
            '/views',
            [
                'lesson_id' => $lesson->id
            ]
        );

        $this->post(
            '/views',
            [
                'lesson_id' => $lesson2->id
            ]
        );

        // $views = count(auth()->user()->views()->where('lesson_id', $lesson->id)->get());
        // print_r(['views'=>$views]);
        $views = json_decode(auth()->user()->views()->where('lesson_id', $lesson->id)->get()->first()->quant);
        // dd($views);
        $response->assertStatus(201);
        $this->assertEquals(2, $views);

    }

    public function test_mark_view_with_invalid_data_fails(): void
    {
        $response = $this->post('/views',[],$this->createAuthHeader());

        $response->assertStatus(422);
    }
}
