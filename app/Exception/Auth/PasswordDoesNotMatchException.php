<?php

namespace App\Exception\Auth;

use Throwable;

class PasswordDoesNotMatchException extends \Exception
{
    public function __construct(string $message = "Password does not match", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
