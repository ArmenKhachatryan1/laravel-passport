<?php

namespace App\Dto\Auth;

use App\Http\Request\AuthRequest\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public string $email;
    public string $password;

    public static function fromRequest(LoginRequest $request): self
    {

       return self::from([
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
    }
}
