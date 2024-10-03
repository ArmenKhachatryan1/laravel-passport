<?php

namespace App\Repository\Auth;

use App\Models\User;

class RegistrationRepository
{
    public function registerUser(array $data): User
    {
        return User::query()->create($data);
    }
}
