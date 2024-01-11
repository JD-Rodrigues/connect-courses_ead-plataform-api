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

 

    
}
