<?php

namespace App\Services\Auth;

use App\Repository\Auth\RegistrationRepository;

readonly class RegistrationService
{

    public function __construct(
        private RegistrationRepository $registrationRepository,
    ) {
    }

    public function run($dto): string
    {
        return $this->registrationRepository->registerUser($dto->toArray());
    }
}
