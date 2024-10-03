<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repository\Auth\RegistrationRepository;

readonly class RegistrationService
{

    public function __construct(
        private RegistrationRepository $registrationRepository,
    ) {
    }

    public function run($dto): User
    {
        dd(56);
        return $this->registrationRepository->registerUser($dto->toArray());
    }
}
