<?php

namespace App\Models\Traits;

use App\Models\User;

trait GetAuthUserTrait
{
    private function getLoggedUser() {
        return auth()->user();
    }
}