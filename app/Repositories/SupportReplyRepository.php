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
        return User::find('e72c3892-42bd-465e-bbfa-fec453e7105e');
    }

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