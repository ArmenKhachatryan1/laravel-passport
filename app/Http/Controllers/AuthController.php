<?php

namespace App\Http\Controllers;

use App\Dto\Auth\LoginDto;
use App\Dto\Auth\RegistrationDto;
use App\Exception\Auth\PasswordDoesNotMatchException;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * @throws PasswordDoesNotMatchException
     */
    public function login(LoginRequest $request, LoginService $loginService): JsonResponse
    {
        $dto = LoginDto::fromRequest($request);

        return $loginService->run($dto);
    }

    public function register(
        RegisterRequest $request,
        RegistrationService $registrationService
    ): JsonResponse {
        $dto = RegistrationDto::fromRequest($request);

        return response()->json($registrationService->run($dto), Response::HTTP_OK);
    }

    public function logout(LogoutService $logoutService): JsonResponse
    {
        return $logoutService->run();
    }
}
