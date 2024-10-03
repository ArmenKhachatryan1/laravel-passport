<?php

namespace App\Dto\Auth;

use App\Http\Requests\AuthRequest\RegisterRequest;
use Spatie\LaravelData\Data;

class RegistrationDto extends Data
{
    public string $name;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): self
    {
        return self::from([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
    }
}
