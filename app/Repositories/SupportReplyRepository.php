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

    static function getSupport($id) {        
        try {
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    private function getLoggedUser() {
        return User::first();
    }

    public function createNewSupport(array $data) {
        return $this->getLoggedUser()
            ->supports()
            ->create($data);         
    }
}