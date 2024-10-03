<?php

namespace App\Services\Auth;

use App\Exception\Auth\PasswordDoesNotMatchException;
use App\Repository\Auth\PassportClientRepository;
use App\Repository\Auth\UserRepository;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

readonly class LoginService
{
    public function __construct(
        private UserRepository $userRepository,
        private PassportClientRepository $passportClientRepository
    ) {
    }

    /**
     * @throws PasswordDoesNotMatchException
     * @throws ConnectionException
     */
    public function run($dto)
    {
        $cacheKey = 'user_' . $dto->email;
        $user = Cache::get($cacheKey);

        if (!$user) {
            Cache::put($cacheKey, $user, now()->addMinutes(10));
        }

        $user = $this->userRepository->findByEmail($dto->email);
        $check = password_verify($dto->password, $user->password);
        if (!$check) {
            throw new PasswordDoesNotMatchException();
        }

        $oClientId = config('passport.password_grant_client.id', '');

        $oClient = $this->passportClientRepository->getById($oClientId);

        $data = [
            'grant_type' => 'password',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'username' => $dto->email,
            'password' => $dto->password,
            'scope' => '*',
        ];
        $response = Http::asForm()->post(config('app.url') . '/oauth/token', $data);
        $response = json_decode($response->getBody()->getContents());
        $response->user = $user;

        return $response;
    }
}
