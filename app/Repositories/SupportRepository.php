<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Models\Traits\GetAuthUserTrait;

class SupportRepository
{
    use GetAuthUserTrait;

    private $entity;

    public function __construct(Support $model) {
        $this->entity = $model;
    }

    public function getMySupports(array $filters) {
        $filters['user'] = true;

        return $this->getAllSupports($filters);
    }

    public function getAllSupports(array $filters) {
        try {
            return $this->entity
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
                    
                    if (isset($filters['user'])) {
                        $user = $this->getLoggedUser();
                        $query->where('user_id', $user->id);
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

    public function createNewSupport(array $data) {
        return $this->getLoggedUser()
            ->supports()
            ->create($data);         
    }
}