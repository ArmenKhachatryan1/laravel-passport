<?php

namespace App\Repository\Auth;

use App\Models\User;

class RegistrationRepository
{
    public function registerUser(array $data): string
    {
        $register = User::query()->create($data);

        if (!$register) {
            return 'Incorrect date';
        }
        return 'Success';
    }
}
