<?php

namespace App\Http\Controllers;

use App\Dto\Auth\LoginDto;
use App\Dto\Auth\RegistrationDto;
use App\Exception\Auth\PasswordDoesNotMatchException;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;

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

    public function register(
        RegisterRequest $request,
        RegistrationService $registrationService
    ): RegisterResource {
        $dto = RegistrationDto::fromRequest($request);

        return new RegisterResource($registrationService->run($dto));
    }

    public function logout(LogoutService $logoutService): JsonResponse
    {
        return $logoutService->run();
    }
}
