<?php

namespace App\Repository\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{

    protected function query(): Builder
    {
        return User::query();
    }

    public function findByEmail(string $email)
    {
        return $this->query()->where('email', $email)->first();
    }
}
