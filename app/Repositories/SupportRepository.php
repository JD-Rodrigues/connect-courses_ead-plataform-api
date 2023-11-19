<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;


class SupportRepository
{
    public function getAllSupports() {
        try {
            return $this->getLoggedUser()->supports()->get();
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
}