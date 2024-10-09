<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Laravel\Passport\Passport;

trait CacheableClient
{
    private function cacheClient($key, $value)
    {
        $cachedClient = Cache::get($key);

        if (!$cachedClient) {
            $client = Passport::client()->where('id', $value)->first();

            Cache::put($key, $client);
        }

        return Cache::get($key);
    }
}
