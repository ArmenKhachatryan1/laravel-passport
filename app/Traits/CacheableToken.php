<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Laravel\Passport\Passport;

trait CacheableToken
{
    public function cacheClientToken($key, $value)
    {
        $token = Cache::get($key);

        if (!$token) {
            $cacheableToken = Passport::token()->where('id', $value)->first();

            Cache::put($key, $cacheableToken, now()->addDays(2));
        }

        return Cache::get($key);
    }
}
