<?php

namespace App\Repository\Vendor;

use App\Traits\CacheableToken;
use Laravel\Passport\TokenRepository as PassportTokenRepository;

class TokenRepository extends PassportTokenRepository
{
    use CacheableToken;

    /* @note OverWriting the first method from TokenRepository */

    public function find($id)
    {
        return $this->cacheToken($id);
    }

    /* @note Caching token */
    private function cacheToken($id)
    {
        $oAuthTokenKey = 'token_' . $id;

        return $this->cacheClientToken($oAuthTokenKey, $id);
    }
}
