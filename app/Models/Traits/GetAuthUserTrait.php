<?php

namespace App\Models\Traits;

use App\Models\User;

trait GetAuthUserTrait
{
    private function getLoggedUser() {
        return User::find('e72c3892-42bd-465e-bbfa-fec453e7105e');
    }
}