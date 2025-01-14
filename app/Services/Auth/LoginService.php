<?php

namespace App\Services\Auth;

use App\Exception\Auth\PasswordDoesNotMatchException;
use App\Repository\Auth\PassportClientRepository;
use App\Repository\Auth\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

readonly class LoginService
{
    public function __construct(
        private UserRepository $userRepository,
        private PassportClientRepository $passportClientRepository
    ) {
    }

    /**
     * @throws PasswordDoesNotMatchException
     */
    public function run($dto): JsonResponse
    {
        $cacheKey = 'user_' . $dto->email;
        $user = Cache::get($cacheKey);

        if (!$user) {
            $user = $this->userRepository->findByEmail($dto->email);

            if ($user) {
                Cache::put($cacheKey, $user, now()->addHour());
            }
        }

        $check = password_verify($dto->password, $user->password);

        if (!$check) {
            throw new PasswordDoesNotMatchException();
        }

        $oClientId = config('passport.password_grant_client.id', '');

        $oClient = $this->passportClientRepository->getById($oClientId);

        $tokenRequest = Request::create('/oauth/token', 'POST', [
            'grant_type' => 'password',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'username' => $dto->email,
            'password' => $dto->password,
            'scope' => '*',
        ]);

        $response = app()->handle($tokenRequest);

        if ($response->getStatusCode() !== 200) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $response = json_decode($response->getContent(), true);

        return response()->json([
            'access_token' => $response['access_token'],
            'refresh_token' => $response['refresh_token'],
            'expires_in' => $response['expires_in'],
        ]);
    }
}
