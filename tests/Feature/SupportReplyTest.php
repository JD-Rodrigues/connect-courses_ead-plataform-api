<?php

namespace Tests\Feature;

use App\Models\Support;
use App\Models\SupportReply;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\AuthUtilsTrait;
use Tests\TestCase;

class SupportReplyTest extends TestCase
{
    use AuthUtilsTrait, RefreshDatabase;
    public function test_post_support_reply_without_authentication_fails(): void
    {
        $response = $this->post('/support-replies', [],['Accept'=>'application/json']);

        $response->assertStatus(401);
    }

    public function test_post_support_reply_with_authentication_succeed(): void
    {
        $support = Support::factory()->create();
        
        $response = $this->post('/support-replies',
            [
                'support_id' => $support->id,
                'description' => 'Esta é uma resposta a uma mensagem de suporte.'
            ],
            $this->createAuthHeader()
        );

        $supportReply = SupportReply::first();
        // dd($response);
        
        $response->assertStatus(201);
        $response->assertJson([
            'support_id' => $support->id,
            'description' => 'Esta é uma resposta a uma mensagem de suporte.'
        ]);
    }

    public function test_post_support_reply_with_invalid_data_fails(): void
    {
        $response = $this->post('/support-replies',[], $this->createAuthHeader());
        
        $response->assertStatus(302);
    }
}
