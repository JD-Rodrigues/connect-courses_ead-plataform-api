<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;


class SupportReplyRepository
{
    public function getAllSupportReplies(array $filters) {
        try {
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    private function getLoggedUser() {
        return User::first();
    }

    public function createNewSupportReply(array $data) {
        return $this->getLoggedUser()
            ->supportReplies()
            ->create($data);         
    }
}