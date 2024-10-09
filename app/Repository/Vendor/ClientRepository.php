<?php

namespace App\Repository\Vendor;

use App\Traits\CacheableClient;
use Laravel\Passport\ClientRepository as PassportClientRepository;

class ClientRepository extends PassportClientRepository
{
    use CacheableClient;

    private TokenRepository $tokenRepository;

    private string $tokenId;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    /* @note OverWriting the first method from ClientRepository */

    public function findActive($id)
    {
        $client = $this->find($id);

        return $client && !$client->revoked ? $client : null;
    }

   /* @note OverWriting the second method from ClientRepository */

    public function find($id)
    {
        $oAuthClientKey = 'client_' . $id;

        return $this->cacheClient($oAuthClientKey, $id);
    }

}
