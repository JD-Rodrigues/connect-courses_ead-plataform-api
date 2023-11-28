<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;


class SupportRepository
{
    public function getAllSupports(array $filters) {
        try {
            return $this->getLoggedUser()
            ->supports()
            ->where(function($query)use($filters){
                if (isset($filters['lesson_id'])) {
                    $query->where('lesson_id', $filters['lesson_id']);
                }
                
                if (isset($filters['status_code'])) {
                    $query->where('status_code', $filters['status_code']);
                }
                if (isset($filters['description'])) {
                    $filter = $filters['description'];
                    $query->where("description", "LIKE", "%{$filter}%");
                }

                
            })
            ->get();
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
        return User::find('e72c3892-42bd-465e-bbfa-fec453e7105e');
    }

    public function createNewSupport(array $data) {
        return $this->getLoggedUser()
            ->supports()
            ->create($data);         
    }
}