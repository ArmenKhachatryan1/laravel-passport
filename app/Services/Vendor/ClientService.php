<?php

namespace App\Services\Vendor;

use App\Repository\Vendor\ClientRepository;
use App\Repository\Vendor\TokenRepository;

class ClientService
{
    private ClientRepository $clientRepository;
    private TokenRepository $tokenRepository;

    public function __construct(ClientRepository $clientRepository, TokenRepository $tokenRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->tokenRepository = $tokenRepository;
    }

    public function run($id, $tokenId)
    {
        $this->clientRepository->findActive($id);

        return $this->cachingToken($tokenId);
    }

    /* @note this method should be executed to cache token  after ClientRepository's methods */
    private function cachingToken($tokenId)
    {
        return $this->tokenRepository->find($tokenId);
    }
}
