<?php

namespace App\Repository\Auth;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;

class PassportClientRepository
{
    public function getById(string $clientId): Client
    {
        return $this->query()->where('id', $clientId)->first();
    }

    private function query(): Builder
    {
        return Client::query();
    }
}
