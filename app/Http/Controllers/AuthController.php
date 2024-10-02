<?php

namespace App\Http\Controllers;

use App\Dto\Auth\LoginDto;
use App\Exception\Auth\PasswordDoesNotMatchException;
use App\Http\Request\AuthRequest\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Client\ConnectionException;

class AuthController extends Controller
{
    /**
     * @throws PasswordDoesNotMatchException
     * @throws ConnectionException
     */
    public function login(LoginRequest $request, LoginService $loginService)
    {
        $dto = LoginDto::fromRequest($request);
        return $loginService->run($dto);
    }
}
