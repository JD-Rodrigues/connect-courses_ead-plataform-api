<?php

namespace App\Repositories;
use App\Models\Traits\GetAuthUserTrait;

class ViewRepository
{
    use GetAuthUserTrait;
    
    public function createNewView(array $data) {
       try {
            $this->getLoggedUser()
            ->views()
            ->create($data);
       } catch (\Throwable $th) {
            return $th->getMessage();
       }
    }

}