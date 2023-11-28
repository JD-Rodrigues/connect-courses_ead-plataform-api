<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Models\Traits\GetAuthUserTrait;


class SupportReplyRepository
{
    use GetAuthUserTrait;

    public function createNewSupportReply(array $data) {
        try {
            return $this->getLoggedUser()
            ->supportReplies()
            ->create($data); 
        } catch (\Throwable $th) {
            return $th->getMessage();
        }        
    }
}